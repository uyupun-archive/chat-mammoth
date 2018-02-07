<template>
    <div>
        <div class="st-Wrapper">
            <div class="st-Container">
                <h2 class="st-Title">チャットルーム検索</h2>
                <div class="sp-Search">
                    <input type="text" class="sp-Search_Textbox form-control" v-model="room_id" autofocus required placeholder="Please room id here!">
                    <button class="st-Button sp-Search_Button" @click="postRoomId()">検索</button>
                </div>
                <div v-if="state" class="sp-Results">
                    <div class="sp-Chatroom">
                        <div class="sp-Chatroom_Name">ルーム名: {{ room.name }}</div>
                        <div>
                            <span>ルームID: {{ room.room_id }}</span>
                            <i class="fas fa-unlock-alt"></i>
                        </div>
                        <div>作成者: {{ room.creator }}</div>
                        <div class="sp-Chatroom_Tag">
                            <span class="st-Tag">タグ</span>
                            <span class="st-Tag">タグ</span>
                            <span class="st-Tag">タグ</span>
                        </div>
                        <div class="sp-Chatroom_Description">
                            <p>{{ room.description }}</p>
                        </div>
                        <div class="sp-Chatroom_LinkBox">
                            <a :href="'/room/' + room.room_id" class="sp-Chatroom_Link">チャットルームへ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                room_id: '',
                state: false,
                room: {}
            }
        },
        methods: {
            postRoomId() {
                axios.post('/api/search/' + this.room_id, {
                    title: this.room_id,
                })
                .then(response => {
                    this.state = true
                    this.room = response.data
                })
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>