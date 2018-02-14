const gulp = require('gulp');
const axios = require('axios');

const url = 'http://127.0.0.1:8000/api/comment/bot'
const room_id = '8400a9016eb098fdc3b33fff27bdc2af'

gulp.task('default', () => {
    setInterval(() => {
        axios.post(url, {
            room_id: room_id,
            user_id: 'anonymous',
            screen_name: 'Anonymous',
            comment: 'わーい、たかし！',
            markdown: 0
        })
    }, 5000)
})