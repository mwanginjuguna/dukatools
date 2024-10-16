<div id="cta-button-sidebar"
     {{ $attributes }}
     aria-label="Sidebar">
    <div class="min-h-screen px-3 py-10 overflow-y-auto bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100">
        <div class="mt-4 mb-6 md:py-4 lg:py-8">
            <a href="/" class="flex items-center ps-2.5 mb-6" wire:navigate>
                <x-application-logo />
                <span class="pl-3 self-center font-semibold text-amber-500 dark:text-amber-500">{{ config('app.name') }}</span>
            </a>
        </div>

        <!-- main pages -->
        <div class="mt-6 lg:mt-8 mb-4 p-2 space-y-3 font-medium">
            <x-side-link
                :href="auth()->user()->role === 'A' ? route('admin.dashboard') : route('dashboard')"
                :active="request()->routeIs('admin.dashboard') ?? request()->routeIs('dashboard')"
                wire:navigate
            >
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve" fill="currentColor"><g> <g> <path fill="#CDCED1" d="M256,48.552c-141.383,0-256,114.617-256,256c0,60.054,20.736,115.235,55.358,158.897h401.284 C491.264,419.787,512,364.606,512,304.552C512,163.169,397.383,48.552,256,48.552"></path> <path fill="#C6421E" d="M240.517,272.808c-14.027,6.85-22.837,22.722-18.882,40.06 c2.913,12.765,13.286,23.128,26.041,26.041c17.346,3.964,33.218-4.855,40.068-18.882c10.152-20.78,19.465-41.966,31.364-61.802 l25.167-41.949l-41.949,25.167C282.492,253.343,261.306,262.647,240.517,272.808"></path> <g> <path fill="#3F3F3F" d="M59.797,384.487c-1.836-4.511-6.991-6.7-11.511-4.846L15.8,392.882 c2.039,5.535,4.193,11.026,6.603,16.375l32.547-13.259C59.462,394.153,61.633,389.007,59.797,384.487"></path> <path fill="#3F3F3F" d="M79.448,304.552c0-4.873-3.955-8.828-8.828-8.828h-70.4C0.124,298.664,0,301.594,0,304.552 c0,2.975,0.282,5.879,0.38,8.828h70.241C75.494,313.379,79.448,309.425,79.448,304.552"></path> <path fill="#3F3F3F" d="M60.737,222.34c1.889-4.493-0.212-9.675-4.705-11.564l-32.397-13.639 c-2.472,5.323-4.767,10.743-6.868,16.26l32.406,13.656c1.121,0.468,2.286,0.689,3.425,0.689 C56.041,227.743,59.316,225.713,60.737,222.34"></path> <path fill="#3F3F3F" d="M68.888,129.923l24.823,24.823c1.721,1.721,3.981,2.578,6.241,2.578 c2.251,0,4.511-0.856,6.241-2.578c3.443-3.452,3.443-9.039,0-12.491L81.37,117.44C77.071,121.457,72.904,125.624,68.888,129.923"></path> <path fill="#3F3F3F" d="M164.556,103.504c1.395,3.425,4.696,5.5,8.183,5.5c1.103,0,2.233-0.212,3.328-0.653 c4.511-1.845,6.682-6.991,4.846-11.511L167.619,64.23c-5.544,2.039-10.964,4.317-16.322,6.727L164.556,103.504z"></path> <path fill="#3F3F3F" d="M256,128c4.873,0,8.828-3.955,8.828-8.828v-70.4c-2.94-0.097-5.87-0.221-8.828-0.221 c-2.957,0-5.888,0.124-8.828,0.221v70.4C247.172,124.045,251.127,128,256,128"></path> <path fill="#3F3F3F" d="M338.211,109.289c1.121,0.477,2.278,0.697,3.425,0.697c3.443,0,6.718-2.03,8.139-5.402 l13.639-32.397c-5.323-2.472-10.743-4.767-16.26-6.868l-13.656,32.406C331.608,102.227,333.718,107.4,338.211,109.289"></path> <path fill="#3F3F3F" d="M430.629,117.44l-24.823,24.823c-3.443,3.443-3.443,9.031,0,12.482 c1.73,1.721,3.99,2.586,6.25,2.586c2.251,0,4.511-0.865,6.241-2.586l24.814-24.823 C439.095,125.623,434.928,121.456,430.629,117.44"></path> </g> <g> <path fill="#C6421E" d="M463.711,229.462l32.618-13.286c-2.048-5.553-4.326-10.973-6.735-16.331l-32.547,13.259 c-4.511,1.845-6.682,6.991-4.846,11.511c1.395,3.425,4.705,5.5,8.183,5.5C461.496,230.115,462.617,229.903,463.711,229.462"></path> <path fill="#C6421E" d="M512,304.552c0-2.957-0.124-5.888-0.221-8.828h-70.4c-4.873,0-8.828,3.955-8.828,8.828 s3.955,8.828,8.828,8.828h70.241C511.717,310.431,512,307.527,512,304.552"></path> <path fill="#C6421E" d="M495.089,395.642l-32.265-13.586c-4.502-1.889-9.666,0.212-11.564,4.705 c-1.889,4.493,0.221,9.675,4.705,11.564l32.335,13.621C490.772,406.615,492.979,401.159,495.089,395.642"></path> </g> <polygon fill="#FFFFFF" points="203.03,189.793 308.961,189.793 308.961,154.483 203.03,154.483 "></polygon> <g> <path fill="#74B73E" d="M185.379,401.655c0,14.627-11.855,26.483-26.483,26.483s-26.483-11.855-26.483-26.483 c0-14.627,11.855-26.483,26.483-26.483S185.379,387.028,185.379,401.655"></path> <path fill="#74B73E" d="M379.586,401.655c0,14.627-11.855,26.483-26.483,26.483s-26.483-11.855-26.483-26.483 c0-14.627,11.855-26.483,26.483-26.483S379.586,387.028,379.586,401.655"></path> </g> </g> </g></svg>
                <span class="ms-3 md:text-base">{{ __('Dashboard') }}</span>
            </x-side-link>


            <x-side-link :href="route('products.index')" :active="request()->routeIs('products.index')" wire:navigate>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve" fill="currentColor">
                    <g> <circle fill="#6B7F9E" cx="256" cy="256" r="256"></circle> <path fill="#FED298" d="M290.749,169.054c20.234-19.061,79.762-37.095,86.8-45.599c7.038-8.504,31.67-53.81,31.67-53.81 l38.561,33.576c2.639,6.011,4.985,12.609,7.184,19.647l-31.523,41.347c-4.105,5.278-35.336,71.844-80.495,70.964l-12.023-13.049 l0.88-15.395c-26.392-1.173-45.013,3.666-51.904,37.975l8.504,6.745c0,15.249-6.451,14.222-17.741,7.771 c-10.263-5.718-15.102-13.196-16.275-21.26c0-8.651,20.674-54.103,36.509-69.058L290.749,169.054z"></path> <path fill="#C6CBD6" d="M182.836,198.671c0,0-101.168,10.997-108.499,13.342c-7.331,2.493-5.278,45.892-5.278,45.892 s104.247,107.766,120.082,142.076s36.948,32.843,59.528,26.245c22.58-6.598,112.605-32.696,115.391-45.746s2.932-36.948-0.88-45.306 c-3.812-8.357-107.18-97.943-134.158-112.751C202.044,207.615,182.836,198.671,182.836,198.671z"></path> <path fill="#6C7678" d="M194.712,195.446c0,0-116.124,15.102-120.376,16.568c-4.252,1.466-2.199,2.053-2.932,4.399 c1.026,1.466,64.806,62.167,81.668,85.48c16.715,23.313,47.359,64.367,47.359,64.367s15.102,20.38,34.309,17.741 c19.207-2.639,125.214-29.178,128.147-38.855c0.733-2.639,1.026-5.425,1.026-8.064c-0.44-23.459-78.442-83.574-131.226-115.83 c-29.178-17.741-37.828-25.659-37.828-25.659L194.712,195.446z"></path> <path fill="#596366" d="M356.435,349.837c1.759-0.88,3.079-1.613,4.252-2.346c0-0.293,0.88-7.331-3.519-14.662 c-4.399-7.331-38.121-39.148-40.027-40.907l-67.152-60.701l-6.011-2.932l73.897,71.111l33.869,34.603 c0.293,0.293,5.278,6.011,4.838,15.982L356.435,349.837z"></path> <path fill="#FFFFFF" d="M57.622,153.952l100.435-10.997c28.444,14.369,41.494,46.186,43.986,73.75l-92.225,15.395 c4.985-41.054-17.448-69.792-52.197-78.002V153.952z"></path> <polygon fill="#E4E7ED" points="107.913,238.406 154.245,289.723 265.53,262.305 213.04,217.879 "></polygon> <polygon fill="#83CF8F" points="120.962,242.658 157.031,283.858 256.733,260.105 212.307,223.304 "></polygon> <path fill="#E4E7ED" d="M69.058,258.053l0.586,25.512c0,0.88,0,3.372,0.586,4.839c6.598,14.662,44.279,57.182,50.731,57.475 c18.914,8.944,9.53-11.29,48.971,46.479c29.617,43.546,31.963,66.126,86.653,48.531c28.738-9.237,103.954-36.948,103.954-36.948 s8.211-9.677,3.666-23.313c-2.786,13.049-92.811,39.148-115.391,45.746s-43.84,8.064-59.528-26.245 C173.452,365.819,69.205,258.053,69.205,258.053H69.058z"></path> <path fill="#83CF8F" d="M248.522,230.635l-1.613-46.332c0,0,0.293-6.598,6.745-0.733 c6.598,5.865,70.378,59.088,71.111,59.675c0.44,0.586,4.252,2.932,4.105,9.237c-0.147,6.305,0,54.836,0,54.836L248.522,230.635z"></path> <path fill="#E4E7ED" d="M188.261,300.719c5.425-1.466,11.143-2.932,12.903-1.32c3.372,2.786-5.278,9.09-10.557,10.117 c-6.451,1.173-12.023,1.32-12.756-1.173c-0.147-0.586-0.293-2.346,0.147-3.079c1.32-2.053,5.425-3.226,10.117-4.545H188.261z"></path> <ellipse transform="matrix(-0.2588 -0.9659 0.9659 -0.2588 -53.1004 563.3247)" fill="#FFFFFF" cx="189.572" cy="302.035" rx="4.5" ry="11.92"></ellipse> <path fill="#E4E7ED" d="M224.916,288.843c5.425-1.466,11.143-2.932,12.903-1.32c3.372,2.786-5.278,9.09-10.557,10.117 c-6.451,1.173-12.023,1.32-12.756-1.173c-0.147-0.586-0.293-2.346,0.147-3.079c1.32-2.053,5.425-3.226,10.117-4.545H224.916z"></path> <ellipse transform="matrix(-0.269 -0.9631 0.9631 -0.269 7.7289 586.1035)" fill="#FFFFFF" cx="226.289" cy="290.119" rx="4.501" ry="11.92"></ellipse> <path fill="#E4E7ED" d="M262.158,278.58c5.425-1.466,11.143-2.932,12.903-1.32c3.372,2.786-5.278,9.09-10.557,10.117 c-6.451,1.173-12.023,1.32-12.756-1.173c-0.147-0.586-0.293-2.346,0.147-3.079c1.32-2.053,5.425-3.226,10.117-4.545H262.158z"></path> <ellipse transform="matrix(-0.2334 -0.9724 0.9724 -0.2334 52.9481 601.4679)" fill="#FFFFFF" cx="263.564" cy="279.863" rx="4.501" ry="11.92"></ellipse> <path fill="#E4E7ED" d="M204.536,319.047c5.425-1.466,11.143-2.932,12.903-1.32c3.372,2.786-5.278,9.09-10.557,10.117 c-6.451,1.173-12.023,1.32-12.756-1.173c-0.147-0.586-0.293-2.346,0.147-3.079c1.32-2.053,5.425-3.226,10.117-4.545H204.536z"></path> <ellipse transform="matrix(-0.2588 -0.9659 0.9659 -0.2588 -50.2164 602.0403)" fill="#FFFFFF" cx="205.867" cy="320.286" rx="4.5" ry="11.92"></ellipse> <path fill="#E4E7ED" d="M241.191,307.024c5.425-1.466,11.143-2.932,12.903-1.32c3.372,2.786-5.278,9.091-10.557,10.117 c-6.451,1.173-12.023,1.32-12.756-1.173c-0.147-0.586-0.293-2.346,0.147-3.079c1.32-2.053,5.425-3.226,10.117-4.545H241.191z"></path> <ellipse transform="matrix(-0.269 -0.9631 0.9631 -0.269 10.8292 624.9623)" fill="#FFFFFF" cx="242.586" cy="308.372" rx="4.501" ry="11.92"></ellipse> <path fill="#E4E7ED" d="M278.433,296.761c5.425-1.466,11.143-2.932,12.903-1.32c3.372,2.786-5.278,9.091-10.557,10.117 c-6.451,1.173-12.023,1.32-12.756-1.173c-0.147-0.586-0.293-2.346,0.147-3.079c1.32-2.053,5.425-3.226,10.117-4.545H278.433z"></path> <ellipse transform="matrix(-0.2334 -0.9724 0.9724 -0.2334 55.3015 639.826)" fill="#FFFFFF" cx="279.861" cy="298.114" rx="4.501" ry="11.92"></ellipse> <path fill="#E4E7ED" d="M221.104,338.401c5.425-1.466,11.143-2.932,12.903-1.32c3.372,2.786-5.278,9.09-10.557,10.117 c-6.451,1.173-12.023,1.32-12.756-1.173c-0.147-0.586-0.293-2.346,0.147-3.079c1.32-2.053,5.425-3.226,10.117-4.545H221.104z"></path> <ellipse transform="matrix(-0.2588 -0.9659 0.9659 -0.2588 -48.1699 642.5737)" fill="#FFFFFF" cx="222.441" cy="339.767" rx="4.5" ry="11.92"></ellipse> <path fill="#E4E7ED" d="M257.759,326.525c5.278-1.466,11.143-2.932,12.903-1.32c3.372,2.786-5.278,9.091-10.557,10.117 c-6.451,1.173-12.023,1.32-12.756-1.173c-0.147-0.586-0.293-2.346,0.147-3.079c1.32-2.053,5.425-3.226,10.117-4.545H257.759z"></path> <ellipse transform="matrix(-0.269 -0.9631 0.9631 -0.269 13.0973 665.6439)" fill="#FFFFFF" cx="259.158" cy="327.852" rx="4.501" ry="11.92"></ellipse> <path fill="#E4E7ED" d="M295.001,316.261c5.425-1.466,11.143-2.932,12.903-1.32c3.372,2.786-5.278,9.09-10.557,10.117 c-6.451,1.173-12.023,1.32-12.756-1.173c-0.147-0.586-0.293-2.346,0.147-3.079c1.32-2.053,5.425-3.226,10.117-4.545H295.001z"></path> <ellipse transform="matrix(-0.2334 -0.9724 0.9724 -0.2334 56.8005 679.9708)" fill="#FFFFFF" cx="296.435" cy="317.595" rx="4.501" ry="11.92"></ellipse> <path fill="#F7635B" d="M218.172,358.781c0,0-2.053,1.026-0.293,5.278c1.613,4.252,6.598,5.278,6.598,5.278 s2.639,2.346,11.143,0.733c8.504-1.759,23.019-6.305,23.019-6.305s4.545-0.44,4.252-4.692c-0.147-4.252-1.466-5.132-1.466-5.132 l-43.4,4.838H218.172z"></path> <path fill="#FF7069" d="M220.664,356.582c-1.026,0.586-3.079,0.733-2.493,2.199c0.293,0.586,1.026,1.466,2.639,2.786 c5.425,4.105,8.064,6.745,15.249,3.666c7.184-2.932,23.459-7.624,23.459-7.624s5.132-3.812-0.733-6.745 C252.921,347.931,255.267,345.585,220.664,356.582z"></path> <path fill="#FCD34E" d="M264.064,344.706c0,0-0.733,4.252,0.147,5.718c0.88,1.466,6.745,10.85,15.542,7.918 c5.865-1.906,22.14-5.425,17.741-12.463c-0.293-0.586-0.44-1.759-0.88-2.199c-5.718-4.985-30.204,0.733-30.204,0.733 L264.064,344.706z"></path> <path fill="#FFE356" d="M270.222,341.48c0,0,11.143-1.906,14.369-3.666c3.079-1.906,10.703-5.425,10.85,0.44 c0.293,5.865,3.666,7.771-2.199,10.41c-5.865,2.639-16.568,8.064-21.553,3.812c-2.932-2.493-7.184-5.425-7.624-7.624 c-0.293-1.613,1.173-2.786,6.158-3.226V341.48z"></path> <path fill="#75BD80" d="M304.238,335.029c0,0-2.493,5.718-0.88,10.703c1.759,4.985,7.478,3.519,10.41,2.786 c3.079-0.733,12.609-4.838,17.301-5.572c4.692-0.733,9.824-3.372,8.797-9.824c-1.026-6.451-1.173-7.331-1.173-7.331l-34.603,9.237 H304.238z"></path> <path fill="#83CF8F" d="M304.238,341.48c0,0,0.44,4.692,12.463,0.88c12.17-3.812,22.433-4.399,22.433-12.609 c0-8.211-2.346-5.718-7.918-4.399c-5.572,1.466-13.929,6.158-18.914,5.425c-9.677-1.466-8.064,4.692-8.064,10.557V341.48z"></path> <path fill="#E4E7ED" d="M92.958,160.55l67.885-8.944l3.079,2.639l-66.859,8.797L92.958,160.55z M129.173,218.172 l65.246-10.41l0.88,2.639l-65.246,10.997l-0.733-3.226H129.173z M123.748,200.724l65.246-8.944l1.32,2.786l-64.953,9.237 L123.748,200.724z M116.27,186.062l65.393-9.237l1.613,2.932l-65.246,9.53L116.27,186.062z M106.3,172.866l65.393-9.384l2.199,2.639 l-64.513,9.824l-2.932-3.079H106.3z"></path> <path fill="#F9F9F9" d="M279.606,245.297l42.227,36.509v7.184l-42.227-36.509V245.297z M284.444,229.022l38.121,33.136v7.184 l-38.121-33.136V229.022z"></path> <path fill="#FED298" d="M286.497,232.394l31.963-14.662l5.132-26.832c5.865-30.644,57.915,27.271,36.509,42.08 c-2.199,1.466-16.568,10.557-20.087,10.85l-25.512,2.053l-18.767,9.09C273.008,268.463,264.357,242.658,286.497,232.394z"></path> <path fill="#FFF7DF" d="M285.911,256.88c-4.399,1.906-11.583-5.278-8.211-8.797l11.29-6.745c0,0,4.985,9.824,8.357,10.41 l-11.29,4.985L285.911,256.88z"></path> <path fill="#FF7069" d="M462.149,146.767l-85.187-74.19l24.632-26.978c30.937,21.407,56.889,49.558,75.803,82.254 l-15.395,19.061L462.149,146.767z"></path> <polygon fill="#FFFFFF" points="462.149,146.767 381.361,76.243 372.27,86.8 453.058,157.178 "></polygon> <path fill="#F9F9F9" d="M266.117,206.589c0.733,0.293,1.466,0.586,2.199,0.88l0,0l0,0c0.147,0,0.147,0.147,0.293,0.147l0,0 l0,0l0.147,0.147l0,0c0.147,0,0.147,0.147,0.293,0.147l0,0c0.147,0,0.147,0.147,0.293,0.147l0,0l0.147,0.147l0,0l0,0l0.147,0.147 l0,0l0,0c0.147,0,0.147,0.147,0.293,0.147l0,0l0,0l0,0l0.147,0.147l0,0l0,0l0.147,0.147l0,0l0,0l0,0l0.147,0.147l0,0l0,0 c0.147,0,0.147,0.147,0.293,0.147l0,0l0,0c3.812,3.519,6.451,9.237,6.451,14.955s-2.639,9.824-6.451,11.143l0,0l0,0 c0,0-0.147,0-0.293,0l0,0l0,0h-0.147l0,0l0,0l0,0h-0.147l0,0l0,0h-0.147l0,0l0,0l0,0c-0.147,0-0.147,0-0.293,0l0,0l0,0h-0.147l0,0 l0,0h-0.147l0,0c-0.147,0-0.147,0-0.293,0l0,0c-0.147,0-0.147,0-0.293,0l0,0h-0.147l0,0l0,0c-0.147,0-0.147,0-0.293,0l0,0l0,0 c-0.733,0-1.466-0.147-2.199-0.44c-0.586-0.147-1.173-0.44-1.613-0.586l0,0l0,0c-0.147-0.147-0.293-0.147-0.586-0.293l0,0 c0,0-0.147,0-0.147-0.147l0,0l0,0c-0.44-0.293-0.88-0.586-1.32-0.88l0,0l0,0l-0.147-0.147l0,0c-4.399-3.372-7.478-9.53-7.478-15.835 c0-6.158,3.079-10.557,7.478-11.436l0,0c0.147,0,0.147,0,0.293,0c0.44,0,0.88-0.147,1.32-0.147l0,0l0,0h0.147l0,0 c0.147,0,0.293,0,0.586,0l0,0c0.44,0.147,1.026,0.147,1.613,0.293L266.117,206.589z M264.504,209.961 c-0.293,1.026-0.586,2.199-0.88,3.372c-0.586-0.293-1.173-0.586-1.759-0.88c0.733-1.026,1.613-1.906,2.639-2.639V209.961z M260.545,211.867c-0.88-0.44-1.613-1.026-2.493-1.466c1.613-1.906,3.812-2.786,6.305-2.639c0.147,0.147,0.293,0.147,0.44,0.293 c-1.759,0.733-3.372,2.053-4.399,3.812H260.545z M257.32,211.427c0.88,0.586,1.759,1.173,2.639,1.759 c-0.586,1.466-1.026,3.079-1.026,4.838l-3.226-0.88C255.853,214.946,256.44,213.04,257.32,211.427z M261.132,213.92 c0.733,0.44,1.466,0.733,2.346,1.026c-0.147,1.32-0.293,2.786-0.293,4.399l-2.932-0.88c0.147-1.759,0.44-3.226,1.026-4.545H261.132z M263.038,221.104c0,1.32,0.147,2.493,0.293,3.812c-0.88-0.147-1.613-0.147-2.493-0.293c-0.44-1.466-0.733-2.932-0.88-4.399 l2.932,0.88H263.038z M259.666,224.623c-0.88,0-1.759,0.147-2.639,0.293c-0.733-1.906-1.32-3.959-1.32-6.011l3.226,0.88 c0.147,1.613,0.44,3.226,0.88,4.838H259.666z M257.759,226.529c0.733-0.147,1.613-0.147,2.493-0.147 c1.026,2.786,2.639,5.278,4.692,7.038c-0.147,0-0.293,0-0.44,0C261.718,232.101,259.372,229.608,257.759,226.529z M261.572,226.383 c0.733,0,1.32,0.147,2.053,0.293c0.293,1.613,0.586,3.079,1.026,4.545c-1.173-1.466-2.199-3.079-2.932-4.838H261.572z M267.876,232.981c0.586-1.466,0.88-2.932,1.173-4.692c0.88,0.44,1.759,0.88,2.639,1.32c-1.026,1.613-2.346,2.786-3.959,3.372 H267.876z M273.008,230.341c0.586,0.293,1.026,0.733,1.613,1.026c-1.466,1.906-3.519,3.079-6.011,3.079 C270.515,233.714,271.982,232.247,273.008,230.341z M275.354,230.195c-0.586-0.44-1.026-0.88-1.613-1.173 c0.586-1.32,0.88-2.932,0.88-4.692l2.053,0.586C276.527,226.969,276.087,228.729,275.354,230.195z M272.568,228.289 c-1.026-0.586-2.053-1.173-3.079-1.613c0.147-1.173,0.293-2.493,0.293-3.666l3.812,1.173c-0.147,1.613-0.44,2.932-0.88,4.252 L272.568,228.289z M269.636,221.104c0-1.613-0.147-3.079-0.293-4.545c1.026,0.147,2.053,0.293,2.932,0.147 c0.586,1.759,1.026,3.666,1.173,5.425l-3.812-1.173V221.104z M273.448,216.706c0.586,0,1.026-0.147,1.613-0.147 c0.88,2.053,1.613,4.399,1.613,6.745l-2.053-0.586c-0.147-2.053-0.44-3.959-1.173-5.865V216.706z M274.181,214.8 c-0.44,0-1.026,0.147-1.466,0.147c-1.026-2.346-2.493-4.399-4.105-6.011C270.809,210.254,272.861,212.307,274.181,214.8z M271.395,214.946c-0.733,0-1.613-0.147-2.493-0.293c-0.293-1.613-0.586-3.226-1.173-4.692c1.466,1.32,2.639,3.079,3.519,4.985 H271.395z M265.091,213.773c0.293,0.147,0.733,0.293,1.026,0.293c0.44,0.147,0.88,0.293,1.466,0.293 c-0.293-1.759-0.733-3.519-1.173-5.132c-0.44,1.32-0.88,2.786-1.173,4.545H265.091z M267.876,216.266 c-0.586-0.147-1.173-0.293-1.613-0.44c-0.44-0.147-0.88-0.293-1.32-0.44c-0.147,1.32-0.293,2.786-0.293,4.252l3.666,1.026 c0-1.466-0.147-2.932-0.293-4.399H267.876z M264.504,221.397c0,1.173,0.147,2.493,0.293,3.666c0.44,0.147,0.88,0.293,1.466,0.293 c0.586,0.147,1.173,0.293,1.759,0.586c0.147-1.173,0.147-2.346,0.293-3.519l-3.666-1.026H264.504z M264.944,226.969 c0.44,0.147,0.733,0.147,1.173,0.293s1.026,0.293,1.466,0.44c-0.293,1.906-0.733,3.519-1.32,5.132 C265.677,230.928,265.237,229.022,264.944,226.969z"></path> </g></svg>

                <span class="ms-3 md:text-base">{{ __('Checkout') }}</span>
            </x-side-link>

            <x-side-link :href="route('products.create')" :active="request()->routeIs('products.create')" wire:navigate>
                <svg class="w-7 h-7 text-amber-500 dark:text-amber-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="M19 16v6"/><path d="M22 19h-6"/></svg>

                <span class="ms-3 md:text-base">{{ __('New Customer') }}</span>
            </x-side-link>

        </div>

        <!-- vendor -->
        <div
            x-data="{expanded: false}"
            class="mt-6 space-y-1 font-medium text-sm xl:text-base shadow-sm shadow-emerald-900 dark:shadow-emerald-700 rounded-lg group"
        >
            <button
                x-on:click="expanded = ! expanded"
                class="w-full inline-flex items-center justify-between px-3 py-2 text-slate-600 dark:text-slate-400 group-hover:text-emerald-500 dark:group-hover:text-emerald-600"
            >
                <span class="inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 me-2.5"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg> {{__('Duka Tools')}}</span>

                <svg x-show="expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                <svg x-show="!expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </button>

            <div x-show="expanded" class="w-full flex flex-col gap-3 lg:gap-6 p-2 lg:px-4 bg-slate-100 dark:bg-slate-900 rounded-b">
                <x-side-link :href="route('products.index')" :active="request()->routeIs('products.index')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/><path d="M2 7h20"/><path d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"/></svg>

                    <span class="ms-3">{{ __('My Shop') }}</span>
                </x-side-link>

                <x-side-link :href="route('products.create')" :active="request()->routeIs('products.create')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>

                    <span class="ms-3">{{ __('Add Product') }}</span>
                </x-side-link>

                <x-side-link :href="route('vendor.categories')" :active="request()->routeIs('vendor.categories')" wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 me-2.5"><path d="m16.02 12 5.48 3.13a1 1 0 0 1 0 1.74L13 21.74a2 2 0 0 1-2 0l-8.5-4.87a1 1 0 0 1 0-1.74L7.98 12"/><path d="M13 13.74a2 2 0 0 1-2 0L2.5 8.87a1 1 0 0 1 0-1.74L11 2.26a2 2 0 0 1 2 0l8.5 4.87a1 1 0 0 1 0 1.74Z"/></svg>
                    {{ __('Categories') }}
                </x-side-link>

                <x-side-link :href="route('vendor.brands')" :active="request()->routeIs('vendor.brands')" wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 me-2.5"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg> {{ __('Brands') }}
                </x-side-link>
            </div>

        </div>

        <!-- vendor -->
        <div
            x-data="{expanded: false}"
            class="mt-6 space-y-1 font-medium text-sm xl:text-base shadow-sm shadow-emerald-900 dark:shadow-emerald-700 rounded-lg group"
        >
            <button
                x-on:click="expanded = ! expanded"
                class="w-full inline-flex items-center justify-between px-3 py-2 text-slate-600 dark:text-slate-400 group-hover:text-emerald-500 dark:group-hover:text-emerald-600"
            >
                <span><svg class="inline-flex items-center" fill="currentColor" width="24" height="24" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><g><path d="M136.948 908.811c5.657 0 10.24-4.583 10.24-10.24V610.755c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v287.816c0 5.657 4.583 10.24 10.24 10.24h81.92zm0 40.96h-81.92c-28.278 0-51.2-22.922-51.2-51.2V610.755c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v287.816c0 28.278-22.922 51.2-51.2 51.2zm278.414-40.96c5.657 0 10.24-4.583 10.24-10.24V551.322c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v347.249c0 5.657 4.583 10.24 10.24 10.24h81.92zm0 40.96h-81.92c-28.278 0-51.2-22.922-51.2-51.2V551.322c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v347.249c0 28.278-22.922 51.2-51.2 51.2zm278.414-40.342c5.657 0 10.24-4.583 10.24-10.24V492.497c0-5.651-4.588-10.24-10.24-10.24h-81.92c-5.652 0-10.24 4.589-10.24 10.24v406.692c0 5.657 4.583 10.24 10.24 10.24h81.92zm0 40.96h-81.92c-28.278 0-51.2-22.922-51.2-51.2V492.497c0-28.271 22.924-51.2 51.2-51.2h81.92c28.276 0 51.2 22.929 51.2 51.2v406.692c0 28.278-22.922 51.2-51.2 51.2zm278.414-40.958c5.657 0 10.24-4.583 10.24-10.24V441.299c0-5.657-4.583-10.24-10.24-10.24h-81.92a10.238 10.238 0 00-10.24 10.24v457.892c0 5.657 4.583 10.24 10.24 10.24h81.92zm0 40.96h-81.92c-28.278 0-51.2-22.922-51.2-51.2V441.299c0-28.278 22.922-51.2 51.2-51.2h81.92c28.278 0 51.2 22.922 51.2 51.2v457.892c0 28.278-22.922 51.2-51.2 51.2zm-6.205-841.902C677.379 271.088 355.268 367.011 19.245 387.336c-11.29.683-19.889 10.389-19.206 21.679s10.389 19.889 21.679 19.206c342.256-20.702 670.39-118.419 964.372-284.046 9.854-5.552 13.342-18.041 7.79-27.896s-18.041-13.342-27.896-7.79z"></path><path d="M901.21 112.64l102.39.154c11.311.017 20.494-9.138 20.511-20.449s-9.138-20.494-20.449-20.511l-102.39-.154c-11.311-.017-20.494 9.138-20.511 20.449s9.138 20.494 20.449 20.511z"></path><path d="M983.151 92.251l-.307 101.827c-.034 11.311 9.107 20.508 20.418 20.542s20.508-9.107 20.542-20.418l.307-101.827c.034-11.311-9.107-20.508-20.418-20.542s-20.508 9.107-20.542 20.418z"></path></g></svg> {{__('Duka sales')}}</span>

                <svg x-show="expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                <svg x-show="!expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </button>

            <div x-show="expanded" class="w-full flex flex-col gap-3 lg:gap-6 p-2 lg:px-4 bg-slate-100 dark:bg-slate-900 rounded-b">
                <x-side-link :href="route('vendor.sales')" :active="request()->routeIs('vendor.sales')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"/><path d="m15 9-6 6"/><path d="M9 9h.01"/><path d="M15 15h.01"/></svg>

                    <span class="ms-3">{{ __('My sales') }}</span>
                </x-side-link>

                <x-side-link :href="route('vendor.pos')" :active="request()->routeIs('vendor.pos')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="8" r="6"/><path d="M18.09 10.37A6 6 0 1 1 10.34 18"/><path d="M7 6h1v4"/><path d="m16.71 13.88.7.71-2.82 2.82"/></svg>

                    <span class="ms-3">{{ __('POS') }}</span>
                </x-side-link>

                <x-side-link :href="route('vendor.today')" :active="request()->routeIs('vendor.today')" wire:navigate>
                    <svg class="w-5 h-5 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 7.5V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h3.5"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h5"/><path d="M17.5 17.5 16 16.3V14"/><circle cx="16" cy="16" r="6"/></svg>
                    {{ __('Today') }}
                </x-side-link>

                <x-side-link :href="route('vendor.today')" :active="request()->routeIs('vendor.today')" wire:navigate>
                    <svg class="w-5 h-5 me-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/></svg> {{ __('Top sales') }}
                </x-side-link>
            </div>

        </div>

        <!-- inventory -->
        <div
            x-data="{expanded: false}"
            class="mt-6 space-y-1 font-medium text-sm xl:text-base shadow-sm shadow-emerald-900 dark:shadow-emerald-700 rounded-lg group"
        >
            <button
                x-on:click="expanded = ! expanded"
                class="w-full inline-flex items-center justify-between px-3 py-2 text-slate-600 dark:text-slate-400 group-hover:text-emerald-500 dark:group-hover:text-emerald-600"
            >
                <span class="inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 me-2.5"><path d="M22 8.35V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8.35A2 2 0 0 1 3.26 6.5l8-3.2a2 2 0 0 1 1.48 0l8 3.2A2 2 0 0 1 22 8.35Z"/><path d="M6 18h12"/><path d="M6 14h12"/><rect width="12" height="12" x="6" y="10"/></svg> {{__('Inventory')}}</span>

                <svg x-show="expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                <svg x-show="!expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </button>

            <div x-show="expanded" class="w-full flex flex-col gap-3 lg:gap-6 p-2 lg:px-4 bg-slate-100 dark:bg-slate-900 rounded-b">
                <x-side-link :href="route('vendor.inventory')" :active="request()->routeIs('vendor.inventory')" wire:navigate>
                    <span class="ms-3">{{ __('Stock') }}</span>
                </x-side-link>

                <x-side-link :href="route('vendor.customers')" :active="request()->routeIs('vendor.customers')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></svg>
                    <span class="ms-3">{{ __('Customers') }}</span>
                </x-side-link>

                <x-side-link :href="route('vendor.suppliers')" :active="request()->routeIs('vendor.suppliers')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2"/><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 4h8"/></svg>
                    <span class="ms-3">{{ __('Suppliers') }}</span>
                </x-side-link>

                <x-side-link :href="route('vendor.manufacturers')" :active="request()->routeIs('vendor.manufacturers')" wire:navigate>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M17 18h1"/><path d="M12 18h1"/><path d="M7 18h1"/></svg>
                    <span class="ms-3">{{ __('Manufacturers') }}</span>
                </x-side-link>
            </div>

        </div>

        <!-- sales -->
        <div
            x-data="{expanded: false}"
            class="mt-6 space-y-1 font-medium text-sm xl:text-base shadow-sm shadow-emerald-900 dark:shadow-emerald-700 rounded-lg"
        >
            <button
                x-on:click="expanded = ! expanded"
                class="w-full inline-flex items-center justify-between px-3 py-2"
            >
                <span>{{__('Sales')}}</span>

                <svg x-show="expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                <svg x-show="!expanded" class="w-5 h-5 ms-2.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </button>

            <div x-show="expanded" class="w-full flex flex-col gap-3 lg:gap-6 p-2 lg:px-4 bg-slate-200 dark:bg-slate-900 shadow-sm rounded-b">
                <x-side-link :href="route('admin.orders')" :active="request()->routeIs('admin.orders')" wire:navigate>
                    {{ __('All') }}
                </x-side-link>

                <x-side-link :href="route('admin.orders')" :active="request()->routeIs('admin.orders')" wire:navigate>
                    {{ __('Sold') }}
                </x-side-link>

                <x-side-link :href="route('orders.index')" :active="request()->routeIs('orders.index')" wire:navigate>
                    {{ __('Customer Orders') }}
                </x-side-link>
            </div>

        </div>

    </div>
</div>
