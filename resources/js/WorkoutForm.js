import DOMPurify from "dompurify"

import Logs from "./Logs";

export default class WorkoutForm {
    constructor() {
        this.exercises = [];
        this.exercises_strings = [];
        this.title = document.getElementById("title");
        this.exercise = document.getElementById("exercise");
        this.add_button = document.getElementById("add-muscle-btn");
        this.remove_button = document.getElementById("remove-exercise-btn");
        this.exercise_view = document.getElementById("exercises_view");
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        this.submit_button = document.getElementById("create-workout-button");
        this.responseLog = document.getElementById("response_log");

        this.request = {};
        this.events();
    }

    events() {
        this.add_button.addEventListener("click", () => this.addExercise());
        // this.remove_button.addEventListener("click", () => this.removeExercise());
        this.submit_button.addEventListener("click", () => this.submitForm());
    }

    createString() {
        let result = "<ul class='my-2 bg-gray-100 rounded-md'>";

        this.exercises_strings.forEach((item, index) => {
            result += `
                <li class='border p-3'>
                    <div class='flex items-center justify-between'>
                        <p>${item}</p>
                        <button type='button' id='remove-exercise-btn'><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></button>
                    </div>
                </li>
            `;
        })

        result += "</ul>";

        return DOMPurify.sanitize(result);
    }

    removeExercise(index) {
        // Fix logic
        this.exercises.splice(index, 1);
        this.exercises_strings.splice(index, 1)

        this.exercise_view.innerHTML = this.createString()
    }

    async submitForm() {
        if(!this.title.value || this.exercises.length === 0) {
            return;
        }

        this.request = {
            "title": this.title.value,
            "exercises": this.exercises
        }
    
        let result;
        try {
            result = await axios.post('/workout', this.request, { headers: { 'X-CSRF-TOKEN': this.csrfToken }  });
        
            window.location.href = `/workout/${result.data.workout_id}`;
        } catch(error) {
            this.responseLog.innerHTML = Logs.errorLog(error.response.data.message);
        }

    }

    addExercise() {
        if(!this.exercise || this.exercises.includes(Number(this.exercise.value))) {
            return;
        }

        this.exercises.push(Number(this.exercise.value))
        this.exercises_strings.push(this.exercise.options[this.exercise.selectedIndex].text)

        this.exercise_view.innerHTML = this.createString()

    }
}