
document.addEventListener('DOMContentLoaded',function(){
    const observer = new MutationObserver(() => {
        document.querySelector('#twitter').innerHTML = document.querySelector('[data-toggle="twitter"]').innerHTML
        twttr.widgets.load(document.querySelector('#twitter'))
    });
    observer.observe(document.querySelector('[data-toggle="twitter"]'), {
        attributes:    true,
        childList:     true,
        characterData: true
    });

})
