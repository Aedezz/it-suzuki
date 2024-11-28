@extends('layout.information')

@section('title', 'Batch Information')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Batch Information</h2>

    <div class="space-y-6">
        <!-- Head Office -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="head-office">
                ➤ Head Office
            </p>
            <div id="head-office" class="hidden mt-3 text-gray-700">
              <p>SERVER</p>
              <p>SDMS IP Local : 117.102.163.242, IP Public : 212.212.0.212</p>
            </div>
        </div>

        <!-- Banjarmasin -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="banjarmasin">
                ➤ Banjarmasin
            </p>
            <div id="banjarmasin" class="hidden mt-3 text-gray-700">
               <p>IP PUBLIK : 117.102.163.242</p>
                <p>ISP : MIT</p>
            </div>
        </div>

        <!-- Banjarmasin II -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="banjarmasin-ii">
                ➤ Banjarmasin II
            </p>
            <div id="banjarmasin-ii" class="hidden mt-3 text-gray-700">
                <p>IP PUBLIK : 117.102.161.170</p>
                <p>ISP : MIT</p>
            </div>
        </div>

        <!-- Pelaihari -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="pelaihari">
                ➤ Pelaihari
            </p>
            <div id="pelaihari" class="hidden mt-3 text-gray-700">
                <p>IP PUBLIK : 114.6.51.50</p>
                <p>ISP : INDOSAT</p>
            </div>
        </div>

        <!-- Batulicin -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="batulicin">
                ➤ Batulicin
            </p>
            <div id="batulicin" class="hidden mt-3 text-gray-700">
                <p>IP PUBLIK : 114.5.12.242</p>
                <p>ISP : INDOSAT</p>
            </div>
        </div>

        <!-- Banjarbaru -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="banjarbaru">
                ➤ Banjarbaru
            </p>
            <div id="banjarbaru" class="hidden mt-3 text-gray-700">
                <p>IP Publik : 103.57.9.26</p>
                <p>ISP : MIT</p>
            </div>
        </div>

        <!-- Barabai -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="barabai">
                ➤ Barabai
            </p>
            <div id="barabai" class="hidden mt-3 text-gray-700">
                <p>IP PUBLIK : 2f2c02e49521.sn.mynetname.net</p>
                <p>ISP : TELKOM SPEEDY</p>
                <p>INDOSAT : 114.5.12.145</p>
            </div>
        </div>

        <!-- Tanjung -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="tanjung">
                ➤ Tanjung
            </p>
            <div id="tanjung" class="hidden mt-3 text-gray-700">
                <p>IP PUBLIK : 114.6.51.18</p>
                <p>ISP : INDOSAT</p>
            </div>
        </div>

        <!-- Ampah -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="ampah">
                ➤ Ampah
            </p>
            <div id="ampah" class="hidden mt-3 text-gray-700">
                <p>IP PUBLIK : muarateweh.freeddns.com</p>
                <p>ISP : TELKOM INDIHOME</p>
            </div>
        </div>

        <!-- Kapuas -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="kapuas">
                ➤ Kapuas
            </p>
            <div id="kapuas" class="hidden mt-3 text-gray-700">
                <p>IP PUBLIK : 114.5.12.230</p>
                <p>ISP : INDOSAT</p>
            </div>
        </div>

        <!-- Palangkaraya -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="palangkaraya">
                ➤ Palangkaraya
            </p>
            <div id="palangkaraya" class="hidden mt-3 text-gray-700">
                <p>IP PUBLIK : 114.5.11.162</p>
                <p>ISP : INDOSAT</p>
            </div>
        </div>

        <!-- Sampit -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="sampit">
                ➤ Sampit
            </p>
            <div id="sampit" class="hidden mt-3 text-gray-700">
                <p>IP PUBLIK : 114.5.11.178</p>
                <p>ISP : INDOSAT</p>           
             </div>
        </div>

        <!-- P. Bun -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="pbun">
                ➤ P. Bun
            </p>
            <div id="pbun" class="hidden mt-3 text-gray-700">
                <p>IP PUBLIK : 114.6.51.130</p>
                <p>ISP : INDOSAT</p> 
            </div>
        </div>

        <!-- Part Depo -->
        <div class="p-4 border border-blue-400 rounded-lg bg-blue-100">
            <p class="text-blue-700 font-semibold cursor-pointer toggle" data-target="part-depo">
                ➤ Part Depo
            </p>
            <div id="part-depo" class="hidden mt-3 text-gray-700">
            </div>
        </div>
    </div>
</div>
@endsection
