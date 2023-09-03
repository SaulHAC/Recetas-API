<x-layout>
    <div class="mx-auto w-[85vw] h-[100vh] pt-8">
        <div class="relative">
            <img src="{{ asset('images/background1.jpg')}}" alt="">
            <div class="bg-white lg:w-1/3 w-1/2 h-1/2 absolute top-1/4 md:left-2/4 p-10 flex flex-col justify-center">
                <h1 class="font-bold md:text-xl text-center mb-2 text-sm">¿No sabes que cocinar?</h1>    
                <p class="md:text-base text-sm">Mira nuestras recetas, seguro que alguna te encantará, pero iremos por portes, primero hecha un vistazo a nuestras categorías.</p>
                <a href="#" class="mt-6 bg-lime-500 hover:bg-lime-600 text-white font-bold py-4 px-4 rounded text-center md:text-base text-sm">
                    VER CATEGORÍAS
                </a>
            </div>
        </div>

        <div class="bg-white p-6 relative">
            <p class="text-lg mb-4 text-xl">Mira estas recetas</p>
            <ul class="flex overflow-x-scroll space-x-10">
                @foreach($recetasArray['meals'] as $receta)
                    <li class="p-2 m-4">
                        <div class="w-[180px] relative">
                            <img src="{{$receta['strMealThumb']}}" alt="">
                            <p class="text-center mt-2">{{ $receta['strMeal'] }}</p>

                            @if (in_array($receta['idMeal'], $favoritos))  
                                <button type="button" onclick="deleteFavorite(this)" id="delete{{ $receta['idMeal'] }}">
                                    <svg class="w-8 absolute top-0 right-0 m-1" viewBox="-4.8 -4.8 33.60 33.60" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-4.8" y="-4.8" width="33.60" height="33.60" rx="16.8" fill="#ff3d3d" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ffffff"></path> </g></svg>
                                </button>

                                <button type="button" onclick="enviarFormulario(this)" style="display: none;" id="add{{ $receta['idMeal'] }}">
                                    <svg class="w-8 absolute top-0 right-0 m-1" viewBox="-4.8 -4.8 33.60 33.60" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#3b4245"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-4.8" y="-4.8" width="33.60" height="33.60" rx="16.8" fill="#3b4245" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ffffff"></path> </g></svg>
                                </button> 

                            @else 
                                <button type="button" onclick="enviarFormulario(this)" id="add{{ $receta['idMeal'] }}">
                                    <svg class="w-8 absolute top-0 right-0 m-1" viewBox="-4.8 -4.8 33.60 33.60" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#3b4245"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-4.8" y="-4.8" width="33.60" height="33.60" rx="16.8" fill="#3b4245" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ffffff"></path> </g></svg>
                                </button>   
                                
                                <button type="button" onclick="deleteFavorite(this)" style="display: none;" id="delete{{ $receta['idMeal'] }}">
                                    <svg class="w-8 absolute top-0 right-0 m-1" viewBox="-4.8 -4.8 33.60 33.60" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-4.8" y="-4.8" width="33.60" height="33.60" rx="16.8" fill="#ff3d3d" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ffffff"></path> </g></svg>
                                </button>
                            @endif

                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function enviarFormulario(button) {
            console.log(button.id);
            const idRecipe = button.id.slice(3);
            const deleteButton = document.getElementById('delete'+idRecipe);

            axios.post('/favorites', {
                recipe_id: idRecipe, 
                })
                .then(response => {
                    console.log(response);
                    button.style.display = 'none';
                    deleteButton.style.display = 'block';
                    // Aquí puedes manejar la respuesta del servidor
                })
                .catch(error => {
                    console.error(error);
                    // Aquí puedes manejar los errores
                });
        }

        function deleteFavorite(button){
            console.log(button.id);
            const idRecipe = button.id.slice(6);
            const addButton = document.getElementById('add'+idRecipe);

            axios.delete(`/favorites/${idRecipe}`)
            .then(response => {
                console.log(response);
                button.style.display = 'none';
                addButton.style.display = 'block';
                // Aquí puedes manejar la respuesta del servidor
            })
            .catch(error => {
                console.error(error);
                // Aquí puedes manejar los errores
            });
        }
    </script>


</x-layout>