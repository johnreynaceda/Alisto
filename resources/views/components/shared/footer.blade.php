<footer class="bg-main relative" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="px-5 py-12 mx-auto max-w-7xl lg:py-5 md:px-12 lg:px-20">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="xl:col-span-1">
                <a href="/"
                    class="text-lg font-bold tracking-tighter transition duration-500 ease-in-out transform text-black tracking-relaxed lg:pr-8">
                    <img src="{{ asset('images/alisto-logo.png') }}" class="h-40" alt="">
                </a>
                <p class="w-1/2 mt-2 text-sm text-gray-100">

                </p>
            </div>
            <div class="grid grid-cols-2 gap-8 mt-12 xl:mt-0 xl:col-span-2">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="font-semibold leading-6 uppercase text-white">
                            DISCOVER
                        </h3>
                        <ul role="list" class="mt-4 space-y-3">
                            <li>
                                <a href="#" class="text-sm text-gray-100 hover:text-blue-300">
                                    Become a Service Provider
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-gray-100 hover:text-blue-300">
                                    All Services
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-gray-100 hover:text-blue-300">
                                    All Locations
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-sm text-gray-100 hover:text-blue-300">
                                    Top Service Providers
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="hidden lg:justify-end md:grid md:grid-cols-1">
                    @if (auth()->check())
                        <div x-data="{
                            rating: 0,
                            hoverRating: 0,
                            ratings: [{ 'amount': 1, 'label': 'Terrible' }, { 'amount': 2, 'label': 'Bad' }, { 'amount': 3, 'label': 'Okay' }, { 'amount': 4, 'label': 'Good' }, { 'amount': 5, 'label': 'Great' }],
                            rate(amount) {
                                if (this.rating == amount) {
                                    this.rating = 0;
                                } else this.rating = amount;
                            },
                            currentLabel() {
                                let r = this.rating;
                                if (this.hoverRating != this.rating) r = this.hoverRating;
                                let i = this.ratings.findIndex(e => e.amount == r);
                                if (i >= 0) { return this.ratings[i].label; } else { return '' };
                            }
                        }"
                            class="flex flex-col items-center justify-center space-y-2 rounded m-2 w-72 h-56 p-3  mx-auto">
                            <div class="flex space-x-0 ">
                                <template x-for="(star, index) in ratings" :key="index">
                                    <button @click="rate(star.amount)" @mouseover="hoverRating = star.amount"
                                        @mouseleave="hoverRating = rating" aria-hidden="true" :title="star.label"
                                        class="rounded-sm text-gray-400 fill-current focus:outline-none focus:shadow-outline p-1 w-12 m-0 cursor-pointer"
                                        :class="{
                                            'text-yellow-500': hoverRating >= star.amount,
                                            'text-yellow-400': rating >= star
                                                .amount && hoverRating >= star.amount
                                        }">
                                        <svg class="w-15 transition duration-150" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </button>

                                </template>
                            </div>
                            <div class="p-2">
                                <template x-if="rating || hoverRating">
                                    <p x-text="currentLabel()"></p>
                                </template>
                                <template x-if="!rating && !hoverRating">
                                    <p>Please Rate!</p>
                                </template>
                            </div>

                        </div>
                    @else
                        <div class="w-full mt-12 md:mt-0">
                            <div class="mt-8 lg:justify-end xl:mt-0">
                                <h3 class="font-semibold leading-6 uppercase text-white">
                                    Subscribe to our newsletter
                                </h3>
                                <p class="mt-4 text-sm font-light text-gray-100 lg:ml-auto">
                                    The latest news, articles, and resources, sent to your inbox
                                    weekly.
                                </p>
                                <div class="inline-flex items-center gap-2 mt-12 list-none lg:ml-auto">
                                    <form class="flex flex-col items-center justify-center max-w-sm mx-auto"
                                        action="">
                                        <div class="flex flex-col w-full gap-1 mt-3 sm:flex-row">
                                            <input name="email" type="email"
                                                class="block w-full px-4 py-2 text-sm font-medium text-white placeholder-gray-400 bg-white border border-gray-300 rounded-full font-spline focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600/50 disabled:opacity-50"
                                                placeholder="Enter your email..." required=""><button type="button"
                                                class="items-center inline-flex  justify-center w-full px-6 py-2.5 text-center text-white duration-200 bg-black border-2 border-black rounded-full nline-flex hover:bg-transparent hover:border-black hover:text-black focus:outline-none lg:w-auto focus-visible:outline-black text-sm focus-visible:ring-black">
                                                <div style="position: relative"></div>
                                                Subscribe<!-- -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true" class="w-4 h-auto ml-2">
                                                    <path fill-rule="evenodd"
                                                        d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <div class="px-5 py-6 mx-auto border-t max-w-7xl sm:px-6 md:flex md:items-center md:justify-between lg:px-20">
        <x-button label="Chat" icon="chat" positive rounded class="font-bold" />
        <div class="flex justify-center mb-8 space-x-6 md:order-last md:mb-0">
            <span class="inline-flex justify-center items-center w-full gap-3 lg:ml-auto md:justify-start md:w-auto">
                <a class="w-6 h-6 transition fill-white hover:fill-gray-500">
                    <span class="sr-only"> github</span>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7 md ">
                        <path
                            d="M12.001 2C6.47813 2 2.00098 6.47715 2.00098 12C2.00098 16.9913 5.65783 21.1283 10.4385 21.8785V14.8906H7.89941V12H10.4385V9.79688C10.4385 7.29063 11.9314 5.90625 14.2156 5.90625C15.3097 5.90625 16.4541 6.10156 16.4541 6.10156V8.5625H15.1931C13.9509 8.5625 13.5635 9.33334 13.5635 10.1242V12H16.3369L15.8936 14.8906H13.5635V21.8785C18.3441 21.1283 22.001 16.9913 22.001 12C22.001 6.47715 17.5238 2 12.001 2Z">
                        </path>
                    </svg>
                </a>

                <a class="w-6 h-6 transition fill-white hover:fill-gray-500">
                    <span class="sr-only">Instagram</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7 md ">
                        <path
                            d="M13.0281 2.00098C14.1535 2.00284 14.7238 2.00879 15.2166 2.02346L15.4107 2.02981C15.6349 2.03778 15.8561 2.04778 16.1228 2.06028C17.1869 2.10944 17.9128 2.27778 18.5503 2.52528C19.2094 2.77944 19.7661 3.12278 20.3219 3.67861C20.8769 4.23444 21.2203 4.79278 21.4753 5.45028C21.7219 6.08694 21.8903 6.81361 21.9403 7.87778C21.9522 8.14444 21.9618 8.36564 21.9697 8.58989L21.976 8.78397C21.9906 9.27672 21.9973 9.8471 21.9994 10.9725L22.0002 11.7182C22.0003 11.8093 22.0003 11.9033 22.0003 12.0003L22.0002 12.2824L21.9996 13.0281C21.9977 14.1535 21.9918 14.7238 21.9771 15.2166L21.9707 15.4107C21.9628 15.6349 21.9528 15.8561 21.9403 16.1228C21.8911 17.1869 21.7219 17.9128 21.4753 18.5503C21.2211 19.2094 20.8769 19.7661 20.3219 20.3219C19.7661 20.8769 19.2069 21.2203 18.5503 21.4753C17.9128 21.7219 17.1869 21.8903 16.1228 21.9403C15.8561 21.9522 15.6349 21.9618 15.4107 21.9697L15.2166 21.976C14.7238 21.9906 14.1535 21.9973 13.0281 21.9994L12.2824 22.0002C12.1913 22.0003 12.0973 22.0003 12.0003 22.0003L11.7182 22.0002L10.9725 21.9996C9.8471 21.9977 9.27672 21.9918 8.78397 21.9771L8.58989 21.9707C8.36564 21.9628 8.14444 21.9528 7.87778 21.9403C6.81361 21.8911 6.08861 21.7219 5.45028 21.4753C4.79194 21.2211 4.23444 20.8769 3.67861 20.3219C3.12278 19.7661 2.78028 19.2069 2.52528 18.5503C2.27778 17.9128 2.11028 17.1869 2.06028 16.1228C2.0484 15.8561 2.03871 15.6349 2.03086 15.4107L2.02457 15.2166C2.00994 14.7238 2.00327 14.1535 2.00111 13.0281L2.00098 10.9725C2.00284 9.8471 2.00879 9.27672 2.02346 8.78397L2.02981 8.58989C2.03778 8.36564 2.04778 8.14444 2.06028 7.87778C2.10944 6.81278 2.27778 6.08778 2.52528 5.45028C2.77944 4.79194 3.12278 4.23444 3.67861 3.67861C4.23444 3.12278 4.79278 2.78028 5.45028 2.52528C6.08778 2.27778 6.81278 2.11028 7.87778 2.06028C8.14444 2.0484 8.36564 2.03871 8.58989 2.03086L8.78397 2.02457C9.27672 2.00994 9.8471 2.00327 10.9725 2.00111L13.0281 2.00098ZM12.0003 7.00028C9.23738 7.00028 7.00028 9.23981 7.00028 12.0003C7.00028 14.7632 9.23981 17.0003 12.0003 17.0003C14.7632 17.0003 17.0003 14.7607 17.0003 12.0003C17.0003 9.23738 14.7607 7.00028 12.0003 7.00028ZM12.0003 9.00028C13.6572 9.00028 15.0003 10.3429 15.0003 12.0003C15.0003 13.6572 13.6576 15.0003 12.0003 15.0003C10.3434 15.0003 9.00028 13.6576 9.00028 12.0003C9.00028 10.3434 10.3429 9.00028 12.0003 9.00028ZM17.2503 5.50028C16.561 5.50028 16.0003 6.06018 16.0003 6.74943C16.0003 7.43867 16.5602 7.99944 17.2503 7.99944C17.9395 7.99944 18.5003 7.43954 18.5003 6.74943C18.5003 6.06018 17.9386 5.49941 17.2503 5.50028Z">
                        </path>
                    </svg>
                </a>
                <a class="w-6 h-6 transition fill-white hover:fill-gray-500">
                    <span class="sr-only"> twitter</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7 md ">
                        <path
                            d="M12.2439 4C12.778 4.00294 14.1143 4.01586 15.5341 4.07273L16.0375 4.09468C17.467 4.16236 18.8953 4.27798 19.6037 4.4755C20.5486 4.74095 21.2913 5.5155 21.5423 6.49732C21.942 8.05641 21.992 11.0994 21.9982 11.8358L21.9991 11.9884L21.9991 11.9991C21.9991 11.9991 21.9991 12.0028 21.9991 12.0099L21.9982 12.1625C21.992 12.8989 21.942 15.9419 21.5423 17.501C21.2878 18.4864 20.5451 19.261 19.6037 19.5228C18.8953 19.7203 17.467 19.8359 16.0375 19.9036L15.5341 19.9255C14.1143 19.9824 12.778 19.9953 12.2439 19.9983L12.0095 19.9991L11.9991 19.9991C11.9991 19.9991 11.9956 19.9991 11.9887 19.9991L11.7545 19.9983C10.6241 19.9921 5.89772 19.941 4.39451 19.5228C3.4496 19.2573 2.70692 18.4828 2.45587 17.501C2.0562 15.9419 2.00624 12.8989 2 12.1625V11.8358C2.00624 11.0994 2.0562 8.05641 2.45587 6.49732C2.7104 5.51186 3.45308 4.73732 4.39451 4.4755C5.89772 4.05723 10.6241 4.00622 11.7545 4H12.2439ZM9.99911 8.49914V15.4991L15.9991 11.9991L9.99911 8.49914Z">
                        </path>
                    </svg>
                </a>

            </span>
        </div>
        <div class="mt-8 md:mt-0 md:order-1 flex-1 flex justify-center">
            <span class="mt-2 text-sm font-light text-gray-100">
                Copyright © 2023
                <a href="#" class="mx-2 text-wickedblue hover:text-gray-500"
                    rel="noopener noreferrer">@ALISTO</a>. Since 2023
            </span>
        </div>
    </div>
</footer>
