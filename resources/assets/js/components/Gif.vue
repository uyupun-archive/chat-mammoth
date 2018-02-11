<template>
    <div>
        <label class="rp-Gif_Label" :for="'gif' + name" v-for="name in names">
            <img :src="'/gif/' + name + '.gif'" alt="" class="rp-Gif_Select">
            <input class="rp-Gif_RadioButton" type="radio" name="gif" :value="name" required :id="'gif' + name">
        </label>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                names: Array.from(new Array(19)).map((v, i) => i),
            }
        },
    }
</script>