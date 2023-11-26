// Hàm bắt đầu bộ đếm ngược
function startCountdown(duration, display) {
    let timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

// Khi trang được tải
document.addEventListener("DOMContentLoaded", function () {
    const tenMinutes = 10 * 60; // Đặt thời gian đếm ngược (10 phút trong ví dụ này)
    const display = document.querySelector('#countdown');
    startCountdown(tenMinutes, display);
});
