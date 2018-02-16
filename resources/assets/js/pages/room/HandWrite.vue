<template>
    <div>
        <canvas id="canvas" class="canvas"></canvas>
        <div class="rp-Form_Other">
            <button type="button" @click="clearCanvas()" class="st-Button rp-Button" :disabled="state">やり直す</button>
            <input type="hidden" :value="image" name="draw">
            <button type="submit" class="st-Button rp-Button" :disabled="state">マサカる</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                myStorage: localStorage,
                canvas: {},
                container: {},
                ctx: {},
                moveflg: 0,
                Xpoint: 0,
                Ypoint: 0,
                defSize: 1,
                defColor: '#323232',
                currentCanvas: 0,
                temp: '',
                image: {},
                state: true
            }
        },
        methods: {
            startPoint(e) {
                e.preventDefault()
                this.ctx.beginPath()

                this.Xpoint = e.layerX
                this.Ypoint = e.layerY

                this.ctx.moveTo(this.Xpoint, this.Ypoint)
            },
            movePoint(e) {
                if(e.buttons === 1 || e.witch === 1) {
                    this.Xpoint = e.layerX
                    this.Ypoint = e.layerY
                    this.moveflg = 1

                    this.ctx.lineTo(this.Xpoint, this.Ypoint)
                    this.ctx.lineCap = 'round'
                    this.ctx.lineWidth = this.defSize * 2
                    this.ctx.strokeStyle = this.defColor
                    this.ctx.stroke();

                }
            },
            endPoint() {
                if(this.moveflg === 0) {
                    this.ctx.lineTo(this.Xpoint-1, this.Ypoint-1)
                    this.ctx.lineCap = 'round'
                    this.ctx.lineWidth = this.defSize * 2
                    this.ctx.strokeStyle = this.defColor
                    this.ctx.stroke()

                }
                this.moveflg = 0
                this.setLocalStoreage()

                this.image = this.canvas.toDataURL()
                this.state= false
            },
            clearCanvas() {
                this.initLocalStorage()
                this.temp = []
                this.ctx.clearRect(0, 0, this.ctx.canvas.clientWidth, this.ctx.canvas.clientHeight)

                this.image = this.canvas.toDataURL()
                this.state = true
            },
            initLocalStorage() {
                this.myStorage.setItem('__log', JSON.stringify([]))
            },
            setLocalStoreage() {
                let png = this.canvas.toDataURL()
                let logs = JSON.parse(this.myStorage.getItem('__log'))

                setTimeout(() => {
                    logs.unshift({png});

                    this.myStorage.setItem('__log', JSON.stringify(logs))

                    this.currentCanvas = 0
                    this.temp = []
                }, 0)
            },
            draw(src) {
                let img = new Image()
                img.src = src;

                img.onload = () => {
                    this.ctx.drawImage(img, 0, 0)
                }
            }
        },
        mounted() {
            this.initLocalStorage()
            this.canvas = document.getElementById('canvas')
            this.ctx = this.canvas.getContext('2d')

            if (document.getElementById('app').offsetWidth > 1200) {
                this.canvas.width = 1200
            } else {
                this.canvas.width = document.getElementById('app').offsetWidth - (document.getElementById('app').offsetWidth / 10)
            }
            this.canvas.height = 100

            $(window).resize(() => {
                if (document.getElementById('app').offsetWidth > 1200) {
                    this.canvas.width = 1200
                } else {
                    this.canvas.width = document.getElementById('app').offsetWidth - (document.getElementById('app').offsetWidth / 10)
                }
            })

            // PC
            this.canvas.addEventListener('mousedown', this.startPoint, false)
            this.canvas.addEventListener('mousemove', this.movePoint, false)
            this.canvas.addEventListener('mouseup', this.endPoint, false)

            // SP
            this.canvas.addEventListener('touchstart', this.startPoint, false)
            this.canvas.addEventListener('touchmove', this.movePoint, false)
            this.canvas.addEventListener('touchend', this.endPoint, false)
        }
    }
</script>