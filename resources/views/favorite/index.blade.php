<x-layout>
    <div class="pt-20 w-[90%] mx-auto">
        <ul class="grid lg:grid-cols-4 md:grid-cols-2 gap-10 my-4">
            @foreach ($meals as $meal)
            <div class="bg-white flex flex-col">
                <img src="{{$meal['strMealThumb']}}" alt="" class="w-50">
                <div class="flex flex-col justify-start px-4 py-3">
                    <p class="font-bold">{{ $meal['strMeal'] }}</p>
                    <p>{{ $meal['strCategory'] }}</p>
                </div>

                <div class="flex justify-end px-4 pb-3">

                    <button type="button" onclick="deleteFavorite(this)" id="delete{{ $meal['idMeal'] }}">
                        <svg class="w-8" viewBox="-4.8 -4.8 33.60 33.60" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-4.8" y="-4.8" width="33.60" height="33.60" rx="16.8" fill="#ff3d3d" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ffffff"></path> </g></svg>
                    </button>

                    <button type="button" onclick="enviarFormulario(this)" style="display: none;" id="add{{ $meal['idMeal'] }}">
                        <svg class="w-8" viewBox="-4.8 -4.8 33.60 33.60" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#3b4245"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-4.8" y="-4.8" width="33.60" height="33.60" rx="16.8" fill="#3b4245" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="#ffffff"></path> </g></svg>
                    </button> 

                </div>
            </div>
            @endforeach
        </ul>
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