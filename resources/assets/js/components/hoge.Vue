<template>
    <div>
        <label class="rp-Gif_Label" :for="'gif' + name" v-for="name in names">
            <img :src="'/gif/' + name + '.gif'" alt="" class="rp-Gif_Select" :id="'gif' + name" @click="isFocus(name)">
            <input class="rp-Gif_RadioButton" type="radio" name="gif" :value="name" :id="'gif' + name">
        </label>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                names: Array.from(new Array(19)).map((v, i) => i),
                oldName: ''
            }
        },
        methods: {
            isFocus(name) {
                document.getElementById('gif' + name).classList.add('focus')
                document.getElementById('gif' + this.oldName).classList.remove('focus')
                this.oldName = name
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../sass/Structure/_Color';

    .focus {
        border: 3px solid $red;
    }
</style>