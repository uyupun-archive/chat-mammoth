<template>
    <div>
        <div class="st-Wrapper">
            <div class="st-Container">
                <h2 class="st-Title">チャットルーム検索</h2>
                <div class="sp-Search row">
                    <div class="col-xs-10">
                        <input type="text" class="sp-Search_Textbox form-control" v-model="room_id" placeholder="Please room id here!" required autofocus>
                    </div>
                    <div class="sp-Search_Button col-xs-2">
                        <button class="st-Button" @click="postRoomId()">検索</button>
                    </div>
                </div>
                <div v-if="state" class="sp-Results">
                    <div class="sp-ChatRoom">
                        <div class="sp-ChatRoom_Name">ルーム名: {{ room.name }}</div>
                        <div>
                            <span>ルームID: </span>
                            <input class="sp-Copy_Area" type="text" :value="room.room_id " :id="'copy' + 's'">
                            <button class="btn st-Tooltip_Button" ontouchstart="" :data-clipboard-target="'#copy' + 's'">
                                <span class="st-Tooltip">Copy</span>
                                <i class="fas fa-clipboard"></i>
                            </button>
                            <i v-if="room.publish === 'private'" class="fas fa-unlock-alt"></i>
                        </div>
                        <div>作成者: {{ room.creator }}</div>
                        <div class="tp-ChatRoom_Tag">
                            <span class="st-Tag" v-for="tag in tags">{{ tag }}</span>
                        </div>
                        <div class="sp-ChatRoom_Description">
                            <p>{{ room.description }}</p>
                        </div>
                        <div class="sp-ChatRoom_LinkBox">
                            <a :href="'/room/' + room.room_id" class="sp-ChatRoom_Link">チャットルームへ</a>
                        </div>
                    </div>
                </div>
                <div v-if="!state" class="sp-ErrorComment_Area">
                    <p>{{ error }}</p>
                </div>
                <div v-if="!state && error === ''" class="sp-Message_Area">
                    <p>{{ message }}</p>
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
                room_id: '',
                state: false,
                room: {},
                message: 'ルームIDを検索してください！',
                error: '',
                tags: []
            }
        },
        methods: {
            postRoomId() {
                axios.post('/api/room/search', {
                    room_id: this.room_id,
                })
                    .then(response => {
                        this.state = true
                        this.room = response.data

                        this.tags = JSON.parse(response.data.tags)
                    })
                    .catch(error => {
                        this.state = false
                        this.room = {}
                        this.error = '該当するルームが見つかりませんでした。'
                    })
            }
        },
        created() {
            const clipboard = new Clipboard('.btn');
        }
    }
</script>