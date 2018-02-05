<template>
    <div>
        <div v-for="room in rooms">
            <div class="tp-Chatroom">
                <div class="tp-Chatroom_Name">ルーム名: {{ room.name }}</div>
                <div>ルームID: {{ room.room_id }}</div>
                <div>作成者: {{ room.creator }}</div>
                <div class="tp-Chatroom_Tag">
                    <span class="st-Tag">タグ</span>
                    <span class="st-Tag">タグ</span>
                    <span class="st-Tag">タグ</span>
                </div>
                <div class="tp-Chatroom_Description">
                    <p>{{ room.description }}</p>
                </div>
                <div class="tp-Chatroom_LinkBox">
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
            getRoom() {
                axios.get('/api/room/get')
                    .then(response => {
                        this.rooms = response.data
                    })
            }
        },
        created() {
            this.getRoom()
        }
    }
</script>

<style lang="scss" scoped>

</style>