export const api = {
    async getData(currentUrl, params) {
        const url = new URL(currentUrl);
        for (let [key, value] of Object.entries(params)) {
            url.searchParams.append(key, String(value));
        }

        try {
            const request = await fetch(url);
            return await request.text();
        } catch (e) {
            return false;
        }
    },
    async submitForm(url, form) {
        try {
            return await fetch(url, {
                method: 'post',
                body: new FormData(form),
            });
        } catch (e) {
            return false;
        }
    }
}