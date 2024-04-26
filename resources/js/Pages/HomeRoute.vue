<template>
    <section
        class="w-full px-8 py-16 bg-gray-100 xl:px-8 h-screen flex items-center"
    >
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col items-center md:flex-row">
                <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                    <p
                        class="font-medium text-blue-500 uppercase"
                        data-primary="blue-500"
                    >
                        Caesar Cipher
                    </p>
                    <h2
                        class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl"
                    >
                        Convert Your Text On The Fly With Ease
                    </h2>
                    <p class="text-xl text-gray-600 md:pr-16">
                        The Caesar Cipher, used by Julius Caesar around 58 BC,
                        is a substitution cipher that offsets letters in a
                        message to make it unreadable if intercepted. To
                        decrypt, the receiver reverses the offset.
                    </p>
                </div>

                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <div
                        class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7"
                        data-rounded="rounded-lg"
                        data-rounded-max="rounded-full"
                    >
                        <h3 class="mb-6 text-2xl font-medium text-center">
                            Convert Your Text
                        </h3>
                        <textarea
                            v-model="inputtext"
                            rows="3"
                            class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none"
                            data-rounded="rounded-lg"
                            data-primary="blue-500"
                            placeholder="Enter your text to convert.."
                        />
                        <div>
                            <label
                                for="offset"
                                class="block mb-2 text-sm font-medium text-gray-900 text-center"
                                >offset by</label
                            >
                            <select
                                v-model="offset"
                                id="offset"
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            >
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                            </select>
                        </div>
                        <textarea
                            v-model="outputtext"
                            rows="3"
                            readonly
                            class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg outline-none hover:cursor-default"
                            data-rounded="rounded-lg"
                            data-primary="blue-500"
                            placeholder="Output"
                        />
                        <div class="flex">
                            <button
                                @click="shiftText('encode')"
                                class="w-1/2 m-1 px-3 py-4 font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700"
                                data-primary="blue-600"
                                data-rounded="rounded-lg"
                            >
                                Encode
                            </button>
                            <button
                                @click="shiftText('decode')"
                                class="w-1/2 m-1 px-3 py-4 font-medium text-white bg-green-600 rounded-lg hover:bg-green-700"
                                data-primary="green-600"
                                data-rounded="rounded-lg"
                            >
                                Decode
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            inputtext: null,
            outputtext: null,
            offset: 13,
        };
    },
    methods: {
        shiftText(mode) {
            fetch("/api/cipher", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    text: this.inputtext,
                    offset: this.offset,
                    mode: mode,
                }),
            })
                .then((response) => response.json())
                .then((data) => (this.outputtext = data.text));
        },
    },
    mounted() {},
};
</script>
