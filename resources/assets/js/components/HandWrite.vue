<template>
    <div>
        <canvas id="canvas" class="canvas" width="700" height="100"></canvas>
        <div style="padding:10px">
            <button type="button" @click="clearCanvas()">リセット</button>
            <button type="button" @click="prevCanvas()">戻る</button>
            <button type="button" @click="nextCanvas()">進む</button>
            <button type="button" @click="chgImg()" value="1">画像変換</button>
            <input type="hidden" :value="image" name="draw">
        </div>
        <div id="img-box"><img id="newImg"></div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                myStorage: localStorage,
                canvas: {},
                ctx: {},
                moveflg: 0,
                Xpoint: 0,
                Ypoint: 0,
                defSize: 1,
                defColor: '#555',
                currentCanvas: 0,
                temp: '',
                image: {}
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
                if(e.buttons === 1 || e.witch === 1 || e.type == 'touchmove') {
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
            },
            clearCanvas() {
                if(confirm('Canvasを初期化しますか？')) {
                    this.initLocalStorage()
                    this.temp = []
                    this.resetCanvas()
                }
            },
            resetCanvas() {
                this.ctx.clearRect(0, 0, this.ctx.canvas.clientWidth, this.ctx.canvas.clientHeight)
            },
            chgImg() {
                document.getElementById('newImg').src = this.canvas.toDataURL()
                this.image = this.canvas.toDataURL()
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
            prevCanvas() {
                let logs = JSON.parse(this.myStorage.getItem('__log'))

                if(logs.length > 0) {
                    this.temp.unshift(logs.shift())

                    setTimeout(() => {
                        this.myStorage.setItem('__log', JSON.stringify(logs))
                        this.resetCanvas();

                        this.draw(logs[0]['png'])

                    }, 0);
                }
            },
            nextCanvas() {
                let logs = JSON.parse(this.myStorage.getItem('__log'))

                if(this.temp.length > 0) {
                    logs.unshift(this.temp.shift())

                    setTimeout(() => {
                        this.myStorage.setItem('__log', JSON.stringify(logs))
                        this.resetCanvas()

                        this.draw(logs[0]['png'])

                    }, 0);
                }
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

<style lang="scss" scoped>
    .canvas {
        position: relative;
        border-radius: 5px;
        background: #fff;
    }
</style>