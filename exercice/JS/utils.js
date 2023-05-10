function createElement(tag, params, html) {

    if (typeof params === 'string') {
        html = params;
        params = {};
    }



    if (typeof tag !== 'string') {
        throw new TypeError('tag must be a String');
    }

    params ??= {};
    html ??= '';

    const elem = document.createElement(tag);

    for (let attr in params) {
        let value = params[attr];
        if (attr === 'html') {
            html = value;
            continue;
        }

        if (typeof value === 'string') {
            elem.setAttribute(attr, value);
        }
        else {
            elem[attr] = value;
        }
    }



    if (html instanceof Element) {
        html = [html];
    }

    if (Array.isArray(html) || html instanceof NodeList) {

        html.forEach(item => {


            if (item instanceof Element) {
                elem.appendChild(item);
            } else if (typeof item === 'string') {
                elem.innerHTML += item;
            }
        });
    } else if (typeof html === 'string') {
        elem.innerHTML = html;
    }
    return elem;

}


function ArrayEquals(array, other) {
    if (!Array.isArray(array) || !Array.isArray(other)) {
        return false;
    }

    if (array.length !== other.length) {
        return false;
    }

    return array.every((val, index) => {
        return val === other[index];
    });

};