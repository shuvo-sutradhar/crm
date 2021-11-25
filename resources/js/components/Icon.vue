<template>
    <div>
      <!-- Dashboard Icon -->
      <svg v-if="name === 'dashboard'"  class="text-gray-200 w-5 h-5" :class="classList" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M14.9066 3.12873C14.9005 3.12223 14.8987 3.11358 14.8923 3.10722C14.8859 3.10086 14.8771 3.09893 14.8706 3.09278C13.3119 1.53907 11.2008 0.666626 8.99996 0.666626C6.79914 0.666626 4.68807 1.53907 3.12935 3.09278C3.12279 3.09893 3.11404 3.10081 3.10763 3.10722C3.10122 3.11363 3.09944 3.12222 3.09334 3.12873C1.93189 4.29575 1.14217 5.78067 0.823851 7.39609C0.505534 9.01151 0.672885 10.685 1.30478 12.2054C1.93668 13.7258 3.00481 15.025 4.37435 15.9389C5.7439 16.8528 7.35348 17.3405 8.99996 17.3405C10.6464 17.3405 12.256 16.8528 13.6256 15.9389C14.9951 15.025 16.0632 13.7258 16.6951 12.2054C17.327 10.685 17.4944 9.01151 17.1761 7.39609C16.8578 5.78067 16.068 4.29575 14.9066 3.12873ZM8.99992 15.6666C8.00181 15.6663 7.01656 15.4414 6.11714 15.0087C5.21773 14.5759 4.42719 13.9464 3.80409 13.1666H7.15015C7.38188 13.4286 7.66662 13.6383 7.98551 13.782C8.3044 13.9257 8.65017 14 8.99992 14C9.34968 14 9.69544 13.9257 10.0143 13.782C10.3332 13.6383 10.618 13.4286 10.8497 13.1666H14.1958C13.5727 13.9464 12.7821 14.5759 11.8827 15.0087C10.9833 15.4414 9.99804 15.6663 8.99992 15.6666ZM8.16659 11.5C8.16659 11.3351 8.21546 11.174 8.30703 11.037C8.3986 10.8999 8.52875 10.7931 8.68102 10.7301C8.83329 10.667 9.00085 10.6505 9.1625 10.6826C9.32415 10.7148 9.47263 10.7942 9.58918 10.9107C9.70572 11.0272 9.78509 11.1757 9.81724 11.3374C9.8494 11.499 9.83289 11.6666 9.76982 11.8189C9.70675 11.9711 9.59994 12.1013 9.4629 12.1929C9.32586 12.2844 9.16474 12.3333 8.99992 12.3333C8.77898 12.3331 8.56714 12.2452 8.41091 12.089C8.25468 11.9327 8.16681 11.7209 8.16659 11.5ZM15.1751 11.5017L15.1665 11.5H11.4999C11.4983 10.9846 11.3373 10.4824 11.0389 10.0623C10.7405 9.64218 10.3193 9.32472 9.83325 9.15352V6.49996C9.83325 6.27894 9.74546 6.06698 9.58918 5.9107C9.4329 5.75442 9.22093 5.66663 8.99992 5.66663C8.77891 5.66663 8.56695 5.75442 8.41067 5.9107C8.25439 6.06698 8.16659 6.27894 8.16659 6.49996V9.15352C7.68054 9.32472 7.25939 9.64218 6.96098 10.0623C6.66256 10.4824 6.50151 10.9846 6.49992 11.5H2.83334L2.82474 11.5017C2.60799 10.9669 2.46221 10.406 2.39114 9.83329H3.16659C3.3876 9.83329 3.59956 9.74549 3.75584 9.58921C3.91212 9.43293 3.99992 9.22097 3.99992 8.99996C3.99992 8.77894 3.91212 8.56698 3.75584 8.4107C3.59956 8.25442 3.3876 8.16663 3.16659 8.16663H2.39114C2.54005 6.9821 3.00621 5.85981 3.74037 4.91838L4.28597 5.46399C4.36335 5.54137 4.4552 5.60274 4.5563 5.64462C4.65739 5.68649 4.76574 5.70804 4.87517 5.70804C4.98459 5.70804 5.09294 5.68649 5.19404 5.64461C5.29513 5.60274 5.38699 5.54136 5.46436 5.46399C5.54173 5.38661 5.60311 5.29476 5.64498 5.19366C5.68686 5.09257 5.70841 4.98422 5.70841 4.87479C5.70841 4.76537 5.68686 4.65702 5.64498 4.55592C5.60311 4.45483 5.54173 4.36297 5.46435 4.2856L4.91881 3.74005C5.86016 3.00613 6.98227 2.5401 8.16659 2.39118V3.16663C8.16659 3.38764 8.25439 3.5996 8.41067 3.75588C8.56695 3.91216 8.77891 3.99996 8.99992 3.99996C9.22093 3.99996 9.4329 3.91216 9.58918 3.75588C9.74546 3.5996 9.83325 3.38764 9.83325 3.16663V2.39118C11.0176 2.5401 12.1397 3.00613 13.081 3.74005L12.5355 4.2856C12.3792 4.44186 12.2914 4.6538 12.2914 4.87479C12.2914 5.09578 12.3792 5.30772 12.5355 5.46399C12.6917 5.62025 12.9037 5.70804 13.1247 5.70804C13.3457 5.70804 13.5576 5.62026 13.7139 5.46399L14.2595 4.91838C14.9936 5.85981 15.4598 6.9821 15.6087 8.16663H14.8333C14.6122 8.16663 14.4003 8.25442 14.244 8.4107C14.0877 8.56698 13.9999 8.77894 13.9999 8.99996C13.9999 9.22097 14.0877 9.43293 14.244 9.58921C14.4003 9.74549 14.6122 9.83329 14.8333 9.83329H15.6087C15.5376 10.406 15.3919 10.9669 15.1751 11.5017Z" fill="currentColor"></path>
      </svg>

      <!-- Shopping-bag Icon -->
      <svg v-if="name === 'bag'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
      </svg>

      <!-- User-round -->
      <svg v-if="name === 'user-round'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>

      <!---User -->
      <svg v-if="name === 'user'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
      </svg>

      <!---Users -->
      <svg v-if="name === 'users'" class="text-gray-200 w-5 h-5" :class="classList" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
      </svg>

      <!---lock-open -->
      <svg v-if="name === 'lock-open'" class="text-gray-200 w-5 h-5" :class="classList" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
      </svg>


      <!-- rss -->
      <svg v-if="name === 'rss'" class="text-gray-200 w-5 h-5" :class="classList" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 5c7.18 0 13 5.82 13 13M6 11a7 7 0 017 7m-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
      </svg>

      <!-- Dot -->
      <svg v-if="name === 'dot'" xmlns="http://www.w3.org/2000/svg"  class="text-gray-200 w-5 h-5" :class="classList" viewBox="0 0 20 20" fill="currentColor">
        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
      </svg>

      <!-- Support -->
      <svg v-if="name === 'support'" class="text-gray-200 w-5 h-5" :class="classList" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.40848 11.7416C8.37264 11.7812 8.33925 11.823 8.30848 11.8666C8.27694 11.9131 8.25172 11.9635 8.23348 12.0166C8.20945 12.0639 8.1926 12.1144 8.18348 12.1666C8.17939 12.2221 8.17939 12.2778 8.18348 12.3333C8.18066 12.4426 8.2035 12.5511 8.25015 12.65C8.28757 12.7534 8.34728 12.8473 8.42505 12.9251C8.50282 13.0028 8.59673 13.0625 8.70015 13.1C8.7999 13.144 8.90775 13.1668 9.01681 13.1668C9.12587 13.1668 9.23373 13.144 9.33348 13.1C9.43689 13.0625 9.53081 13.0028 9.60857 12.9251C9.68634 12.8473 9.74605 12.7534 9.78348 12.65C9.82048 12.5486 9.83746 12.4411 9.83348 12.3333C9.83411 12.2236 9.81309 12.1149 9.77162 12.0134C9.73015 11.9118 9.66905 11.8195 9.59181 11.7416C9.51434 11.6635 9.42218 11.6015 9.32063 11.5592C9.21908 11.5169 9.11016 11.4951 9.00015 11.4951C8.89014 11.4951 8.78121 11.5169 8.67966 11.5592C8.57812 11.6015 8.48595 11.6635 8.40848 11.7416ZM9.00015 0.666626C7.35197 0.666626 5.7408 1.15537 4.37039 2.07105C2.99998 2.98672 1.93188 4.28821 1.30115 5.81093C0.67042 7.33365 0.505392 9.0092 0.826935 10.6257C1.14848 12.2422 1.94215 13.7271 3.10759 14.8925C4.27303 16.058 5.75788 16.8516 7.37439 17.1732C8.9909 17.4947 10.6665 17.3297 12.1892 16.699C13.7119 16.0682 15.0134 15.0001 15.9291 13.6297C16.8447 12.2593 17.3335 10.6481 17.3335 8.99996C17.3335 7.90561 17.1179 6.82198 16.6991 5.81093C16.2804 4.79988 15.6665 3.88122 14.8927 3.1074C14.1189 2.33358 13.2002 1.71975 12.1892 1.30096C11.1781 0.882174 10.0945 0.666626 9.00015 0.666626ZM9.00015 15.6666C7.6816 15.6666 6.39267 15.2756 5.29634 14.5431C4.20002 13.8105 3.34553 12.7694 2.84095 11.5512C2.33637 10.333 2.20434 8.99256 2.46158 7.69936C2.71881 6.40615 3.35375 5.21826 4.2861 4.28591C5.21845 3.35356 6.40634 2.71863 7.69954 2.46139C8.99275 2.20416 10.3332 2.33618 11.5514 2.84076C12.7695 3.34535 13.8107 4.19983 14.5433 5.29616C15.2758 6.39249 15.6668 7.68142 15.6668 8.99996C15.6668 10.7681 14.9644 12.4638 13.7142 13.714C12.4639 14.9642 10.7683 15.6666 9.00015 15.6666ZM9.00015 4.83329C8.56103 4.83301 8.12959 4.94839 7.74924 5.16783C7.36888 5.38726 7.05304 5.70301 6.83348 6.08329C6.77318 6.17814 6.7327 6.28421 6.71446 6.39511C6.69622 6.50601 6.7006 6.61945 6.72734 6.72861C6.75408 6.83778 6.80262 6.94041 6.87005 7.03032C6.93748 7.12024 7.0224 7.19558 7.1197 7.25183C7.21701 7.30808 7.32469 7.34406 7.43626 7.35761C7.54783 7.37116 7.66099 7.362 7.76893 7.33069C7.87687 7.29938 7.97736 7.24655 8.06435 7.17539C8.15135 7.10423 8.22305 7.01621 8.27515 6.91663C8.34857 6.78946 8.45429 6.68394 8.5816 6.61077C8.70892 6.53761 8.8533 6.49938 9.00015 6.49996C9.22116 6.49996 9.43312 6.58776 9.5894 6.74404C9.74568 6.90032 9.83348 7.11228 9.83348 7.33329C9.83348 7.55431 9.74568 7.76627 9.5894 7.92255C9.43312 8.07883 9.22116 8.16663 9.00015 8.16663C8.77913 8.16663 8.56717 8.25442 8.41089 8.4107C8.25461 8.56698 8.16681 8.77895 8.16681 8.99996V9.83329C8.16681 10.0543 8.25461 10.2663 8.41089 10.4225C8.56717 10.5788 8.77913 10.6666 9.00015 10.6666C9.22116 10.6666 9.43312 10.5788 9.5894 10.4225C9.74568 10.2663 9.83348 10.0543 9.83348 9.83329V9.68329C10.3846 9.48331 10.8479 9.09598 11.1425 8.58902C11.437 8.08205 11.5439 7.4877 11.4446 6.90987C11.3454 6.33203 11.0461 5.80747 10.5993 5.42789C10.1525 5.0483 9.58643 4.83784 9.00015 4.83329Z" fill="currentColor"></path>
      </svg>

      <!-- arrow down -->
      <svg v-if="name == 'arrow-down'" class="text-gray-400" :class="classList"  width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.08335 0.666657C8.75002 0.333323 8.25002 0.333323 7.91669 0.666657L5.00002 3.58332L2.08335 0.666657C1.75002 0.333323 1.25002 0.333323 0.916687 0.666657C0.583354 0.99999 0.583354 1.49999 0.916687 1.83332L4.41669 5.33332C4.58335 5.49999 4.75002 5.58332 5.00002 5.58332C5.25002 5.58332 5.41669 5.49999 5.58335 5.33332L9.08335 1.83332C9.41669 1.49999 9.41669 0.99999 9.08335 0.666657Z" fill="currentColor"></path>
      </svg>
      
      <!-- arrow-right -->
      <svg v-if="name == 'arrow-right'" :class="classList" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>

      <!-- arrow-right-sm -->
      <svg v-if="name == 'arrow-right-sm'" class="text-white" :class="classList" width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1.23242 9.3689C1.06762 9.36887 0.906542 9.31997 0.769534 9.2284C0.632526 9.13683 0.525742 9.0067 0.462684 8.85445C0.399625 8.7022 0.383124 8.53467 0.415263 8.37304C0.447403 8.21141 0.526741 8.06294 0.643249 7.9464L3.58916 5L0.643224 2.05364C0.486959 1.89737 0.399171 1.68543 0.39917 1.46444C0.399169 1.24345 0.486957 1.03151 0.64322 0.875248C0.799483 0.718984 1.01142 0.631195 1.23241 0.631194C1.4534 0.631193 1.66534 0.718981 1.82161 0.875244L5.35676 4.41084C5.43416 4.48819 5.49556 4.58004 5.53745 4.68114C5.57934 4.78224 5.6009 4.89059 5.6009 5.00003C5.6009 5.10946 5.57934 5.21782 5.53745 5.31891C5.49556 5.42001 5.43416 5.51186 5.35676 5.58922L1.82161 9.12478C1.74432 9.20228 1.65249 9.26375 1.55137 9.30564C1.45026 9.34754 1.34186 9.36903 1.23242 9.3689Z" fill="currentColor"></path>
      </svg>

      <!-- arrow-left -->
      <svg v-if="name == 'arrow-left'" class="w-5 h-5" :class="classList" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
      </svg>

      <!-- cog -->
      <svg v-if="name === 'cog'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>

      <!-- Logout -->
      <svg v-if="name === 'logout'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
      </svg>

      <!-- Sun -->
      <svg v-if="name === 'sun'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
      </svg>

      <!-- moon -->
      <svg v-if="name === 'moon'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
      </svg>

      <!-- pdf -->
      <svg v-if="name === 'pdf'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
      </svg>

      <!-- briefcase -->
      <svg v-if="name === 'briefcase'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
      </svg>

      <!-- view-lsit -->
      <svg v-if="name === 'view-lsit'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
      </svg>

      <!-- lightning-bolt -->
      <svg v-if="name === 'lightning-bolt'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
      </svg>

      <!-- love -->
      <svg v-if="name === 'love'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
      </svg>

      <!-- toggle bar -->
      <svg v-if="name === 'toggle-bar'" class="text-white bg-indigo-500 hover:bg-indigo-600 block h-8 w-8 p-2 rounded" :class="classList" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
          <title>Mobile menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
      </svg>

      <!-- x-circle -->
      <svg v-if="name === 'x-circle'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>

      <!-- rounded-nav-toggle -->
      <svg v-if="name === 'rounded-toggle-bar'" class="text-indigo-400 bg-indigo-100 hover:bg-indigo-300 dark:bg-gray-700 dark:hover:bg-gray-800 block h-8 w-8 p-2 rounded-full transition-height ease-in-out duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
          <title>Mobile menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
      </svg>

      <!-- rounded--nav-toggle -->
      <svg v-if="name === 'rounded-close'" class="text-indigo-400 bg-indigo-100 hover:bg-indigo-300 dark:bg-gray-700 dark:hover:bg-gray-800 block h-8 w-8 p-2 rounded-full transition-height ease-in-out duration-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
          <title>Mobile menu</title>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>

      <!-- office-building -->
      <svg v-if="name === 'office-building'" xmlns="http://www.w3.org/2000/svg" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
      </svg>


      <!-- plus-sm -->
      <svg v-if="name === 'plus-sm'" xmlns="http://www.w3.org/2000/svg" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
      </svg>

      <!-- trash -->
      <svg v-if="name === 'trash'" xmlns="http://www.w3.org/2000/svg" class="text-white w-4 h-4" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
      </svg>

      <!-- edit -->
      <svg v-if="name === 'edit'" xmlns="http://www.w3.org/2000/svg" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
      </svg>

      <!-- back -->
      <svg v-if="name === 'back'" xmlns="http://www.w3.org/2000/svg" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
      </svg>

      <!-- save -->
      <svg v-if="name === 'save'" :class="classList" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
      </svg>


      <!-- search-circle -->
      <svg xmlns="http://www.w3.org/2000/svg" v-if="name === 'search-circle'" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>

      <!-- search -->
      <svg xmlns="http://www.w3.org/2000/svg" v-if="name === 'search'" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>

      <!-- eye -->
      <svg xmlns="http://www.w3.org/2000/svg" v-if="name === 'eye'" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
      </svg>

      <!-- eye-off -->
      <svg xmlns="http://www.w3.org/2000/svg" v-if="name === 'eye-off'" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
      </svg>


      <!-- credit-card -->
      <svg v-if="name === 'credit-card'" class="text-white w-5 h-5" :class="classList" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
      </svg>

      <!-- table -->
      <svg v-if="name === 'table'" class="text-white w-5 h-5" :class="classList" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
      </svg>
  
      <!-- grid-view -->
      <svg v-if="name === 'view-grid'" class="text-white w-5 h-5" :class="classList" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
      </svg>

      <!-- info -->
      <svg  v-if="name === 'information-circle'" class="text-white w-5 h-5" :class="classList" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>

      <!-- circle-check -->
      <svg v-if="name === 'check-circle'" class="text-white w-5 h-5" :class="classList" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>

      <!-- tag -->
      <svg v-if="name === 'tag'" class="text-white w-5 h-5" :class="classList" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
      </svg>

      <!-- currency-dollar -->
      <svg v-if="name === 'currency-dollar'" xmlns="http://www.w3.org/2000/svg" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>

      <!-- photograph -->
      <svg v-if="name === 'photograph'" xmlns="http://www.w3.org/2000/svg" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
      </svg>


      <!-- cube-transparent -->
      <svg v-if="name === 'cube-transparent'" xmlns="http://www.w3.org/2000/svg" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
      </svg>


      <!-- clipboard-check -->
      <svg v-if="name === 'clipboard-check'" xmlns="http://www.w3.org/2000/svg" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
      </svg>


      <!-- chevron-down-check -->
      <svg v-if="name === 'chevron-down'" xmlns="http://www.w3.org/2000/svg" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>

      <!-- chevron-double-down-check -->
      <svg v-if="name === 'chevron-double-down'" xmlns="http://www.w3.org/2000/svg" class="text-white w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7m14-8l-7 7-7-7" />
      </svg>

      <!-- dots-horizontal-check -->
      <svg v-if="name === 'dots-horizontal'" xmlns="http://www.w3.org/2000/svg" class="text-white w-2 h-2" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
      </svg>


      <!-- dots-horizontal-check -->
      <svg v-if="name ===  'braille'" viewBox="0 0 50 50" class="text-white w-2 h-2" :class="classList" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <image width="50" height="50" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAABLElEQVRoge2XQU4CQRBFnyQOK8AteBwOgHoMRW6JaAKEhYJeQ9zjostkFu1QY9puEv5LKrPoyqt0T7qTD0KcBF3gEXgGvqwWwBSoTsDn4hrYAIdfag2MCvpcdGtD34AJ0LO6AXa2tsJ3kql9bmYm3gKDyPqgNvyhgM/Ni0knDT231rMo4HOzN2mvoadvPZ8FfHQ8TSY8xoXT9R8+90a29h039PysvRbwuZkSTnFH/HJeAR/Wc1/A56YivOsH4J1wEftWd7WhS+CygK8Vo9rwWC2BYUFfKyrCu/5EeHn2wJzw+/9ycql9QohEKI9k8LlQHsnkc6M8ksmnPBJDeSSBz43ySEZfK5RHhDgTlEcy+Fwoj2TyuVEeyeRTHomhPJLA50Z5JKOvFcoj4tz4BgKCVi697ZlQAAAAAElFTkSuQmCC" id="img_1" />
        </defs>
        <use xlink:href="#img_1" fill="#FFFFFF" stroke="none" />
      </svg>
      
      <!-- mail -->
      <svg v-if="name === 'mail'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
      </svg>

      <!-- phone -->
      <svg v-if="name === 'phone'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
      </svg>

      <!-- pencil -->
      <svg v-if="name === 'pencil'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
      </svg>

      <!-- menu-alt-2 -->
      <svg v-if="name === 'identification'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
      </svg>

      <!-- menu-alt-2 -->
      <svg v-if="name === 'menu-alt-2'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
      </svg>

      <!-- radio-stop -->
      <svg v-if="name === 'radio-stop'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
      </svg>


      <!-- switch-vertical -->
      <svg v-if="name === 'switch-vertical'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
      </svg>

      <!-- paper-clip -->
      <svg v-if="name === 'paper-clip'" xmlns="http://www.w3.org/2000/svg" class="text-gray-200 w-5 h-5" :class="classList" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
      </svg>

    </div>
</template>


<script>
export default {
  name: 'Icon',

  props: ['name', 'classList']

}
</script>

