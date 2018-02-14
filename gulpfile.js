const gulp = require('gulp');
const axios = require('axios');
const env = require('node-env-file');

env('.env')

const url = process.env.BOT_POST_URL
const room_id = process.env.BOT_ROOM_ID

gulp.task('default', () => {
    setInterval(() => {
        axios.post(url, {
            room_id: room_id,
            user_id: 'anonymous',
            screen_name: 'Anonymous',
            comment: 'ほげほげ',
            markdown: 0
        })
    }, 5000)
})