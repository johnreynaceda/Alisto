@section('title', 'Dashboard')
<x-provider-layout>
    <div>

        <div class="grid grid-cols-3 gap-5">
            <div class="border-2 cursor-pointer border-main bg-gray-100 rounded-xl relative overflow-hidden group p-6">
                <div class="flex justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-gray-500 ">
                        <path
                            d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM17.7929 19.9142L21.3284 16.3787L22.7426 17.7929L17.7929 22.7426L14.2574 19.2071L15.6716 17.7929L17.7929 19.9142Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-main text-3xl">50</p>
                    <p class="mt-1 text-gray-500">Total Services</p>
                </div>
                <div class="absolute -bottom-2 -right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 opacity-20 group-hover:opacity-50 fill-main">
                        <path
                            d="M13 14.0619V22H4C4 17.5817 7.58172 14 12 14C12.3387 14 12.6724 14.021 13 14.0619ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM17.7929 19.9142L21.3284 16.3787L22.7426 17.7929L17.7929 22.7426L14.2574 19.2071L15.6716 17.7929L17.7929 19.9142Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="border-2 cursor-pointer border-main bg-gray-100 rounded-xl relative overflow-hidden group p-6">
                <div class="flex justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-gray-500  ">
                        <path
                            d="M5.32894 3.27158C6.56203 2.8332 7.99181 3.10749 8.97878 4.09446C10.0997 5.21537 10.3014 6.90741 9.58382 8.23385L20.2925 18.9437L18.8783 20.3579L8.16933 9.64875C6.84277 10.3669 5.1502 10.1654 4.02903 9.04421C3.04178 8.05696 2.76761 6.62665 3.20652 5.39332L5.44325 7.63C6.02903 8.21578 6.97878 8.21578 7.56457 7.63C8.15035 7.04421 8.15035 6.09446 7.56457 5.50868L5.32894 3.27158ZM15.6963 5.15512L18.8783 3.38736L20.2925 4.80157L18.5247 7.98355L16.757 8.3371L14.6356 10.4584L13.2214 9.04421L15.3427 6.92289L15.6963 5.15512ZM8.97878 13.2868L10.393 14.7011L5.08969 20.0044C4.69917 20.3949 4.066 20.3949 3.67548 20.0044C3.31285 19.6417 3.28695 19.0699 3.59777 18.6774L3.67548 18.5902L8.97878 13.2868Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-main text-3xl">24</p>
                    <p class="mt-1 text-gray-500">Total Appointments </p>
                </div>
                <div class="absolute -bottom-2 -right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 opacity-20 group-hover:opacity-50 fill-main">
                        <path
                            d="M5.32894 3.27158C6.56203 2.8332 7.99181 3.10749 8.97878 4.09446C9.96603 5.08171 10.2402 6.51202 9.80129 7.74535L20.646 18.5902L18.5247 20.7115L7.67887 9.86709C6.44578 10.3055 5.016 10.0312 4.02903 9.04421C3.04178 8.05696 2.76761 6.62665 3.20652 5.39332L5.44325 7.63C6.02903 8.21578 6.97878 8.21578 7.56457 7.63C8.15035 7.04421 8.15035 6.09446 7.56457 5.50868L5.32894 3.27158ZM15.6963 5.15512L18.8783 3.38736L20.2925 4.80157L18.5247 7.98355L16.757 8.3371L14.6356 10.4584L13.2214 9.04421L15.3427 6.92289L15.6963 5.15512ZM8.62523 12.9333L10.7465 15.0546L5.7968 20.0044C5.21101 20.5902 4.26127 20.5902 3.67548 20.0044C3.12415 19.453 3.09172 18.5793 3.57819 17.99L3.67548 17.883L8.62523 12.9333Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="border-2 cursor-pointer border-main bg-gray-100 rounded-xl relative overflow-hidden group p-6">
                <div class="flex justify-end">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 fill-gray-500  ">
                        <path
                            d="M20 22H18V20C18 18.3431 16.6569 17 15 17H9C7.34315 17 6 18.3431 6 20V22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13ZM12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-main text-3xl">100</p>
                    <p class="mt-1 text-gray-500">Total Client </p>
                </div>
                <div class="absolute -bottom-2 -right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="h-20 opacity-20 group-hover:opacity-50 fill-main">
                        <path
                            d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</x-provider-layout>
