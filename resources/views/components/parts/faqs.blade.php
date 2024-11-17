<?php

$faqsList = [
    [
        'question' => 'Is Dukatools easy to use?',
        'answer' => 'Absolutely! Dukatools is designed with simplicity in mind. Our user-friendly interface makes it easy for anyone to navigate—no tech skills required!'
    ],
    [
        'question' => 'What types of businesses can use Dukatools?',
        'answer' => 'Dukatools is perfect for a variety of businesses! Whether you run a hardware store, grocery shop, shoe boutique, cosmetics store, or any other retail business, Dukatools can help streamline your operations.'
    ],
    [
        'question' => 'How do I set up Dukatools?',
        'answer' => 'To set up Dukatools, first sign up for a free account. Then, follow the prompts to create your store, set up your products, and manage your orders. It takes only a few minutes to get started!'
    ],
    [
        'question' => 'Do I need to download an app?',
        'answer' => 'No need! Dukatools is accessible via web browsers on any device—desktop or mobile. Just log in from anywhere with an internet connection and manage your shop on the go!'
    ],
    [
        'question' => 'What are the benefits of Dukatools?',
        'answer' => 'Dukatools offers a range of benefits for your business. First, it helps you stay on top of your sales, track inventory, and manage customer orders. Second, it simplifies your operations, making them easier to understand and manage.'
    ],
    [
        'question' => 'What if I have issues or questions?',
        'answer' => 'We’re here to help! Our dedicated support team is available to assist you with any questions or concerns. You can reach out via email or through our support chat feature within the app.'
    ],
    [
        'question' => 'Is my data secure?',
        'answer' => 'Yes! We take data security seriously. Dukatools uses advanced encryption technologies and follows best practices to protect your personal and business information.'
    ],
    [
        'question' => 'How do I get started?',
        'answer' => 'Getting started is simple! Just click on the Sign Up button on our landing page and follow the steps outlined above. Join the Dukatools community today and take your business to new heights!'
    ],
];

?>

<div x-data="{ openIndex: null }" class="max-w-2xl mx-auto mt-8">
    <h2 class="font-semibold text-sm mb-1">Frequently Asked Questions</h2>

    <p class="font-medium text-2xl mb-2">You might be wondering about these questions</p>

    @foreach ($faqsList as $index => $faq)
        <div class="border-b border-gray-200">
            <button @click="openIndex === {{ $index }} ? openIndex = null : openIndex = {{ $index }}" class="flex justify-between items-center w-full py-4 text-left focus:outline-none">
                <span class="font-semibold">{{ $faq['question'] }}</span>
                <svg x-show="openIndex === {{ $index }}" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m8-6l3 3-3 3" /></svg>
                <svg x-show="openIndex !== {{ $index }}" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m6 0l-3-3m3 3l-3 3" /></svg>
            </button>
            <div x-show.transition.duration.300ms="openIndex === {{ $index }}" class="py-2 pl-4">
                <p>{{ $faq['answer'] }}</p>
            </div>
        </div>
    @endforeach
</div>
