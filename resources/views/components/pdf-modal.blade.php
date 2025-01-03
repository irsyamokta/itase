<div id="pdfModal" class="hidden fixed px-5 inset-0 mt-20 bg-black bg-opacity-70 flex items-center justify-center z-50">
    <div class="absolute inset-0" onclick="closePDF()"></div>
    <div class="relative bg-white rounded-lg shadow-lg max-w-4xl w-full max-h-screen overflow-hidden z-10 lg:left-34">
        <iframe id="pdfFrame" class="w-full h-[80vh] border-none" src=""></iframe>
    </div>
</div>

<script>
    function openPDF(url) {
        document.getElementById('pdfFrame').src = url;
        document.getElementById('pdfModal').classList.remove('hidden');
    }

    function closePDF() {
        document.getElementById('pdfModal').classList.add('hidden');
        document.getElementById('pdfFrame').src = '';
    }
</script>
