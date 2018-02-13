<template>
    <div>
        <div v-for="(room, i) in rooms">
            <div class="tp-ChatRoom">
                <div class="tp-ChatRoom_Name">ルーム名: {{ room.name }}</div>
                <div>
                    <span>ルームID: </span>
                    <input class="tp-Copy_Area" type="text" :value="room.room_id " :id="'copy' + i + 'nr'">
                    <button class="btn tp-Copy_Button st-Tooltip_Button" :data-clipboard-target="'#copy' + i + 'nr'">
                        <span class="st-Tooltip">Copy</span>
                        <i class="fas fa-clipboard"></i>
                    </button>
                    <i class="far fa-heart" @click="postFavorite(room.room_id)"></i>
                    <span>{{ room.favorite }}</span>
                    <!--<i class="fas fa-heart" @click="postFavorite(room.room_id)"></i>-->
                </div>
                <div>作成者: {{ room.creator }}</div>
                <div class="tp-ChatRoom_Tag">
                    <span class="st-Tag" v-for="(tag) in tags[i]">{{ tag }}</span>
                </div>
                <div class="tp-ChatRoom_Description">
                    <p>{{ room.description }}</p>
                </div>
                <div class="tp-ChatRoom_LinkBox">
                    <a :href="'/room/' + room.room_id" class="tp-ChatRoom_Link">チャットルームへ</a>
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
                rooms: {},
                tags: []
            }
        },
        methods: {
            getRooms() {
                axios.get('/api/room/get')
                    .then(response => {
                        this.rooms = response.data

                        for (let i = 0; i < response.data.length; i++) {
                            this.tags.push(JSON.parse(response.data[i].tags))
                        }
                    })
            },
            postFavorite(room_id) {
                axios.post('/api/favorite/post', {
                    room_id: room_id
                })
            },
        },
        created() {
            this.getRooms()

            const clipboard = new Clipboard('.btn');
        }
    }
</script>