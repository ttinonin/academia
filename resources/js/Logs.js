import DOMPurify from "dompurify";

export default class Logs {
    static errorLog(message) {
        return DOMPurify.sanitize(`
            <div class="rounded-md border border-rose-700 bg-red-100">
                <div class="p-3">
                    <p class="text-red-800 font-semibold text-lg">Error</p>
                </div>

                <hr class="border-rose-700">

                <div class="p-3">
                    <p class="text-red-800">${message}</p>
                </div>
            </div>
        `);
    }

    static succesLog(message) {
        return DOMPurify.sanitize(`
            
        `)
    }
}