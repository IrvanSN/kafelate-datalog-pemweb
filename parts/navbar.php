<?php
$header = <<<XYZ
<div class="navbar">
    <div class="fixed w-full h-[75px] px-[30px] bg-white shadow-md flex">
      <span class="flex-none w-[35px] h-auto my-auto border border-gray-400 rounded-md" onclick="openSidebar()">
        <svg class="w-6 h-6 m-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
      </span>
        <div class="flex-auto"></div>
        <div class="flex-none w-[40px] h-[40px] my-auto rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#94a3b8" class="w-full h-full"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        </div>
    </div>
</div>
XYZ;
echo $header;