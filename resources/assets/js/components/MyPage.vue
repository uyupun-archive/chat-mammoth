<template>
    <div>
        <div v-for="room in rooms">
            <div class="mp-Chatroom">
                <div class="mp-Chatroom_Name">ルーム名: {{ room.name }}</div>
                <div>ルームID: {{ room.room_id }}</div>
                <div>作成者: {{ room.creator }}</div>
                <div class="mp-Chatroom_Tag">
                    <span class="st-Tag">タグ</span>
                    <span class="st-Tag">タグ</span>
                    <span class="st-Tag">タグ</span>
                </div>
                <div class="mp-Chatroom_Description">
                    <p>{{ room.description }}</p>
                </div>
                <div class="mp-Chatroom_LinkBox">
                    <a :href="'/room/' + room.room_id" class="tp-Chatroom_Link">チャットルームへ</a>
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
                rooms: {}
            }
        },
        methods: {
            getRooms() {
                axios.get('/api/myroom/get')
                    .then(response => {
                        this.rooms = response.data
                    })
            }
        },
        created() {
            this.getRooms()
        }
    }
</script>