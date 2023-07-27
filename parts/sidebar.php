<?php
$isDashboardSelected = $selected == 'dashboard' ? 'text-white' : 'text-gray-400';
$isCategorySelected = $selected == 'kategori' ? 'text-white' : 'text-gray-400';
$isProductSelected = $selected == 'produk' ? 'text-white' : 'text-gray-400';
$isLabelSelected = $selected == 'label' ? 'text-white' : 'text-gray-400';
$isReviewSelected = $selected == 'review' ? 'text-white' : 'text-gray-400';
$header = <<<XYZ
<aside class="font-poppins">
    <div class="flex flex-col justify-between overflow-y-auto fixed h-screen w-72 py-4 px-3 bg-gray-800 lg:left-0 -left-72 shadow-md" id="sidebar">
        <div class="flex">
            <div class="flex content-center w-full h-25">
                <img src="/public/assets/datalog-logo-white.png" alt="">
            </div>
            <div class="flex-auto"></div>
            <span class="flex-none w-[35px] h-auto my-auto ml-[25px] lg:hidden" onclick="openSidebar()">
              <svg class="w-6 h-6 m-auto text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </span>
        </div>
        <ul class="flex-none space-y-2 pt-4 my-4 border-t border-gray-700">
            <li>
                <a href="/admin/dashboard" class="flex items-center p-2 text-base font-normal rounded-lg $isDashboardSelected hover:bg-gray-700">
                    <svg class="w-6 h-6 $isDashboardSelected fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/category" class="flex items-center p-2 text-base font-normal rounded-lg $isCategorySelected hover:bg-gray-700">
                    <svg class="w-6 h-6 $isCategorySelected fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                    <span class="ml-3">Kategori</span>
                </a>
            </li>
            <li>
                <a href="/admin/product" class="flex items-center p-2 text-base font-normal rounded-lg $isProductSelected hover:bg-gray-700">
                    <svg class="w-6 h-6 $isProductSelected" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    <span class="ml-3">Produk</span>
                </a>
            </li>
            <li>
                <a href="/admin/label" class="flex items-center p-2 text-base font-normal rounded-lg $isLabelSelected hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 $isLabelSelected" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                    </svg>
                    <span class="ml-3">Label</span>
                </a>
            </li>
            <li>
                <a href="/admin/review" class="flex items-center p-2 text-base font-normal rounded-lg $isReviewSelected hover:bg-gray-700">
                    <svg class="w-6 h-6 $isReviewSelected" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="ml-3">Review</span>
                </a>
            </li>
        </ul>
        <div class="flex-auto"></div>
        <ul class="space-y-2 pt-4 my-4 border-t border-gray-700">
            <li>
                <span id="logoutLink" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="ml-3" onclick="confirmLogout()">Keluar</span>
                </span>
            </li>
        </ul>
    </div>
</aside>
XYZ;
echo $header;