<div class="py-10">
  <div class="max-w-7xl mx-auto">
      <form  wire:submit.prevent='searchWord'>
          <div class="md:grid md:grid-cols-3 gap-5">
        
              <div class="mb-5">
                  <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Plazo</label>
                  <select class="border-gray-300 p-2 w-full rounded-md" wire:model="plazo">
                      <option  value="0">--Seleccione--</option>
                      <option value="1">Enero - Marzo</option>
                      <option value="2">Abril - Junio</option>
                      <option value="3">Julio - Septiembre</option>
                      <option value="4">Octubre - Diciembre</option>
                  </select>
              </div>
              <div class="mb-5">
                  <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Carrera</label>
                  <select class="border-gray-300 p-2 w-full rounded-md" wire:model="categoria">
                      <option  value="0">--Seleccione--</option>
              
                      @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                       @endforeach
                      
                     {{--  @foreach ($editoriales as $editorial )
                          <option value="{{ $editorial->edicion }}">{{ $editorial->edicion }}</option>
                      @endforeach --}}
                  </select>
                  
              </div>
              <div class="mt-5 justify-center">
              <button type="submit"
                  class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold px-10 rounded cursor-pointer uppercase py-2 md:w-auto">
                  <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i>
                  Mostrar
              </button>
              <button type="submit"
                  class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase md:w-auto">
                  <i class="fa-solid fa-magnifying-glass fa-flip-horizontal"></i>
                  Exportar
              </button>
          </div>
          </div>

          
      </form>
  </div>
</div>



<!--<div flex flex-wrap>
        {{-- The best athlete wants his opponent at his best. --}} {{--md:flex md:justify-left p-5 text-2xl w-full md:w-1/2   w-full md:w-1/2--}}
     <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl md:justify-center">
       <div class="md:grid md:grid-cols-1 gap-2">
        <div  class="custom-select">
          <select  name="combo" id="select-options" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
          px-10 py-8 rounded cursor-pointer uppercase w-full md:w-100 mb-1">
          <option value="">Seleccionar plazo</option> 
          <option value="1">ENE-MAR</option>
          <option value="2">ABR-JUN</option>
          <option value="3">JUL-SEP</option>
          <option value="4">OCT-DIC</option>
          <option value="5">AÑO</option>
        </select>
      </div>
</div>
<button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Contador Público</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Ingeniería en Gestión Empresarial</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Ingeniería en Sistemas Computacionales</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Ingeniería Mecatrónica</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Ingeniería Industrial</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Ingeniería Electromecánica</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Ingeniería Electrónica</button>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 transition-colors text-white text-sm font-bold
            px-10 py-2 rounded cursor-pointer uppercase w-full md:w-100 mb-2">Todas las carreras</button>   
            
                  
        </div> 
   </div>-->

   <!--<div>
    <div class="bg-white h-screen flex justify-center items-center">
     <div><h5>Ing. en Sistemas<p>Computacionales<p></h5></div>
     <div class="flex flex-row justify-around w-full max-w-4xl">
       
       <div class="flex flex-col items-center">ISC
         <div class="bg-green-500 w-12 h-48"></div>
         <span class="text-black mt-2">50</span>
       </div>
   
       
       <div class="flex flex-col items-center">CP
         <div class="bg-blue-500 w-12 h-40"></div>
         <span class="text-black mt-2">40</span>
       </div>
   
       
       <div class="flex flex-col items-center">GE
         <div class="bg-red-500 w-12 h-20"></div>
         <span class="text-black mt-2">33</span>
       </div>
   
        
        <div class="flex flex-col items-center">II
         <div class="bg-pink-500 w-12 h-20"></div>
         <span class="text-black mt-2">32</span>
       </div>
 
        
        <div class="flex flex-col items-center">IM
         <div class="bg-yellow-500 w-12 h-20"></div>
         <span class="text-black mt-2">30</span>
       </div>
 
      
       <div class="flex flex-col items-center">IEM
         <div class="bg-purple-500 w-12 h-28"></div>
         <span class="text-black mt-2">25</span>
       </div>
       
      
       <div class="flex flex-col items-center">IE
         <div class="bg-gray-500 w-12 h-20"></div>
         <span class="text-black mt-2">14</span>
       </div>
     </div>
     Libros en Total
   </div>-->