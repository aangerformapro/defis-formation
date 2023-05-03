
(() => {


    const loader = document.querySelector('#loadingAnimation'), content = document.querySelector('#displayContent');



    function toggle(delay = 3000) {

        setTimeout(() => {
            let display = getComputedStyle(loader).display;
            loader.style.display = display === 'none' ? 'block' : 'none';
            content.style.display = display;



        }, delay);
    }

    document.onload = () => {
        toggle();
    }
    // toggle();


    let div = Object.assign(
        document.createElement('div'),
        { style: 'color: red; position: absolute; bottom:0; right:0;' }
    ), seconds = 0;


    document.body.appendChild(div);



    let interval = setInterval(() => {
        seconds++;

        div.innerHTML = seconds + 's';


    }, 1000);

    setTimeout(() => {
        clearInterval(interval)
    }, 10500)



})();