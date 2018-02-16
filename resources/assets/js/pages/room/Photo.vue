<template>
    <div>
        <label class="rp-File_Area" for="file-area">
            <i class="fas fa-cloud-upload-alt fa-4x rp-Cloud_Upload"></i>
            <p class="rp-File_Text">画像を選択</p>
            <input type="file" name="image" class="rp-File_Input mr-auto" required accept="image/*" id="file-area" @change="changeState()">
        </label>
        <div class="rp-Form_Other d-flex">
            <button type="submit" class="st-Button rp-Button" :disabled="state">マサカる</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                state: true,
                image: ''
            }
        },
        methods: {
            changeState() {
                this.state = false;
            }
        }
    }
</script>