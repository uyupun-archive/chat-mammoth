<template>
    <div>
        <div v-if="rooms" v-for="(room, index) in rooms">
            <div class="mp-Chatroom">
                <div class="mp-Chatroom_Name">ルーム名: {{ room.name }}</div>
                <div>
                    <span>ルームID: </span>
                    <input type="text" :value="room.room_id " :id="'copy' + index + 'mp'">
                    <button class="btn st-Tooltip_Button" :data-clipboard-target="'#copy' + index + 'mp'">
                        <span class="st-Tooltip">Coyp</span>
                        <i class="fas fa-clipboard"></i>
                    </button>
                    <i v-if="room.publish === 'private'" class="fas fa-unlock-alt"></i>
                </div>
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
    import Clipboard from 'clipboard'

    export default {
        data() {
            return {
                rooms: {}
            }
        },
        methods: {
            getRooms() {
                axios.get('/api/mypage/get')
                    .then(response => {
                        this.rooms = response.data
                    })
            }
        },
        created() {
            this.getRooms()
            const clipboard = new Clipboard('.btn');
        }
    }
</script>