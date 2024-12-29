<div class="grid grid-cols-1 gap-4 md:grid-cols-4 md:gap-6 2xl:gap-5 mt-5">
    <!-- Card Item Start -->
    <div class="rounded-lg border-2 border-accent bg-white px-7.5 py-6 shadow-default">
        <div class="flex flex-col gap-2 items-start justify-start">
            <div class="flex gap-2 justify-center items-center">
                <svg class="w-12 h-12" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M1 4C1 2.34315 2.34315 1 4 1H15V3H4V5H15V15H4C2.34315 15 1 13.6569 1 12V4ZM12 11C12.5523 11 13 10.5523 13 10C13 9.44771 12.5523 9 12 9C11.4477 9 11 9.44771 11 10C11 10.5523 11.4477 11 12 11Z" fill="#C8ACD6"></path> </g></svg>
                <h4 class="text-title-sm font-bold text-black">
                    Pendapatan
                </h4>
            </div>
            <span class="text-2xl font-medium">Rp{{ number_format($revenue, 0, ',', '.') }}</span>
        </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div class="rounded-lg border-2 border-accent bg-white px-7.5 py-6 shadow-default">
        <div class="flex flex-col gap-2 items-start justify-start">
            <div class="flex gap-2 justify-center items-center">
                <svg class="w-12 h-12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M19.3517 7.61665L15.3929 4.05375C14.2651 3.03868 13.7012 2.53114 13.0092 2.26562L13 5.00011C13 7.35713 13 8.53564 13.7322 9.26787C14.4645 10.0001 15.643 10.0001 18 10.0001H21.5801C21.2175 9.29588 20.5684 8.71164 19.3517 7.61665Z" fill="#C8ACD6"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V10C2 6.22876 2 4.34315 3.17157 3.17157C4.34315 2 6.23869 2 10.0298 2C10.6358 2 11.1214 2 11.53 2.01666C11.5166 2.09659 11.5095 2.17813 11.5092 2.26057L11.5 5.09497C11.4999 6.19207 11.4998 7.16164 11.6049 7.94316C11.7188 8.79028 11.9803 9.63726 12.6716 10.3285C13.3628 11.0198 14.2098 11.2813 15.0569 11.3952C15.8385 11.5003 16.808 11.5002 17.9051 11.5001L18 11.5001H21.9574C22 12.0344 22 12.6901 22 13.5629V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22ZM10.4983 14.4394C10.8079 14.7146 10.8357 15.1887 10.5606 15.4983L7.89389 18.4983C7.75157 18.6584 7.54756 18.75 7.33333 18.75C7.11911 18.75 6.9151 18.6584 6.77278 18.4983L5.43944 16.9983C5.16425 16.6887 5.19214 16.2146 5.50173 15.9394C5.81131 15.6643 6.28537 15.6921 6.56056 16.0017L7.33333 16.8711L9.43944 14.5017C9.71463 14.1921 10.1887 14.1643 10.4983 14.4394Z" fill="#C8ACD6"></path> </g></svg>
                <h4 class="text-title-sm font-bold text-black">
                    Submission
                </h4>
            </div>
            <span class="text-2xl font-medium">{{ $submissions }}</span>
        </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div class="rounded-lg border-2 border-accent bg-white px-7.5 py-6 shadow-default">
        <div class="flex flex-col gap-2 items-start justify-start">
            <div class="flex items-center justify-center gap-2">
                <svg class="w-12 h-12"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#C8ACD6"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="none" d="M0 0h24v24H0z"></path> <path d="M12 11a5 5 0 0 1 5 5v6H7v-6a5 5 0 0 1 5-5zm-6.712 3.006a6.983 6.983 0 0 0-.28 1.65L5 16v6H2v-4.5a3.5 3.5 0 0 1 3.119-3.48l.17-.014zm13.424 0A3.501 3.501 0 0 1 22 17.5V22h-3v-6c0-.693-.1-1.362-.288-1.994zM5.5 8a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zm13 0a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM12 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"></path> </g> </g></svg>
                <h4 class="text-title-sm font-bold text-black">Total Peserta</h4>
            </div>
            <span class="text-2xl font-medium">{{ $participants }}</span>
        </div>
    </div>
    <!-- Card Item End -->

    <!-- Card Item Start -->
    <div class="rounded-lg border-2 border-accent bg-white px-7.5 py-6 shadow-default">
        <div class="flex flex-col gap-2 items-start justify-start">
            <div class="flex gap-2 justify-center items-center">
                <svg class="w-12 h-12"  fill="#C8ACD6" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>ionicons-v5_logos</title><path d="M126.12,315.1A47.06,47.06,0,1,1,79.06,268h47.06Z"></path><path d="M149.84,315.1a47.06,47.06,0,0,1,94.12,0V432.94a47.06,47.06,0,1,1-94.12,0Z"></path><path d="M196.9,126.12A47.06,47.06,0,1,1,244,79.06v47.06Z"></path><path d="M196.9,149.84a47.06,47.06,0,0,1,0,94.12H79.06a47.06,47.06,0,0,1,0-94.12Z"></path><path d="M385.88,196.9A47.06,47.06,0,1,1,432.94,244H385.88Z"></path><path d="M362.16,196.9a47.06,47.06,0,0,1-94.12,0V79.06a47.06,47.06,0,1,1,94.12,0Z"></path><path d="M315.1,385.88A47.06,47.06,0,1,1,268,432.94V385.88Z"></path><path d="M315.1,362.16a47.06,47.06,0,0,1,0-94.12H432.94a47.06,47.06,0,1,1,0,94.12Z"></path></g></svg>
                <h4 class="text-title-sm font-bold text-black">
                    Total Tim
                </h4>
            </div>
            <span class="text-2xl font-medium">{{ $tims }}</span>
        </div>
    </div>
    <!-- Card Item End -->
</div>
