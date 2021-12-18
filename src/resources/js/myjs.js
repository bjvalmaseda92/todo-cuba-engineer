window.formatHTML = function () {
    return {
        tag: /\B(\#[a-zA-Z]+\b)(?!;)/,
        email: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,
        link: /([a-zA-Z0-9]?http[s]?:\/\/)?((?:(?:\w+)\.)(?:\S+)(?:\.(?:\w+))+?)/,
        user: /\B(\@[a-zA-Z]+\b)(?!;)/,

        //regular expression for every tag type

        //split the string and check every part
        formatText(text) {
            let arr = text.split(" ");
            for (i in arr) {
                arr[i] = arr[i].replace(this.tag, this.formatTag(arr[i]));
                arr[i] = arr[i].replace(this.user, this.formatUser(arr[i]));
                arr[i] = arr[i].replace(this.link, this.formatLink(arr[i]));
                arr[i] = arr[i].replace(this.email, this.formatEmail(arr[i]));
            }

            return arr.join(" "); //!covert array in string again
        },

        // clean all html tag from a text
        unformattedText(text) {
            text = text.replace(/<[^>]*>?/g, "");
            return text;
        },

        //aux function
        formatTag(tag) {
            return (
                '<a href="#"><span class="rounded bg-violet-300 px-1 text-violet-800">' +
                tag +
                "</span></a>"
            );
        },

        formatEmail(email) {
            return (
                '<a href="#"><span class="rounded bg-orange-300 px-1 text-orange-800">' +
                email +
                "</span></a>"
            );
        },

        formatUser(user) {
            return (
                '<a href="#"><span class="rounded bg-green-300 px-1 text-green-800">' +
                user +
                "</span></a>"
            );
        },
        formatLink(link) {
            return (
                '<a href="#"><span class="rounded bg-blue-300 px-1 text-blue-800">' +
                link +
                "</span></a>"
            );
        },
    };
};
