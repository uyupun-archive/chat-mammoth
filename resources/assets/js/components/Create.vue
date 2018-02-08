<template>
    <div>
        <div class="cp-Item_Title">公開設定</div>
        <div class="cp-Public_Area">
            <input type="radio" name="publish" id="public" value="public" class="cp-RadioBox_Public" checked @click="state = !state">
            <label for="public" class="cp-Chatroom_public">公開</label>
        </div>
        <div class="cp-Private_Area">
            <input type="radio" name="publish" id="private" value="private" class="cp-RadioBox_Private" @click="state = !state">
            <label for="private" class="cp-Chatroom_private">非公開</label>
            <input type="text" name="password" id="password" class="cp-RadioBox_Secret form-control" placeholder="Please enter a password." :disabled="state">
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                state: true
            }
        }
    }
</script>