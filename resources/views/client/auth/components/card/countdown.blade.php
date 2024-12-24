<div class="grid grid-cols-1">
    <div class="rounded-lg border-2 border-accent bg-secondary px-7.5 py-6 shadow-default">
        <div class="flex flex-col gap-2 items-center justify-center">
            <div class="flex gap-2 justify-center items-center">
                <h4 class="text-title-xs font-bold text-white">
                    Batas Submit
                </h4>
            </div>
            <span id="countdown" class="text-md md:text-3xl font-bold text-white text-center"></span>
        </div>
    </div>
</div>

<script>
    const countdownDate = new Date("2024-12-31T23:59:59").getTime();
    const interval = setInterval(() => {

        const now = new Date().getTime();
        const distance = countdownDate - now;
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerText =
            `${days} Hari : ${hours} Jam : ${minutes} Menit : ${seconds} Detik`;
        if (distance < 0) {
            clearInterval(interval);
            document.getElementById("countdown").innerText = "Waktu Habis";
        }
    }, 1000);
</script>
