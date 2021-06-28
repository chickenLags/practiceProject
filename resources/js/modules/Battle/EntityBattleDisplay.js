import Time from "../Time";

class EntityDisplayBattle {
    constructor(entity ='enemy') {
        this.statsWindow = document.querySelector(`.${entity}-stats`);
        this.healthBarBackground = this.statsWindow.querySelector('.hp-bar');
        this.currentHealthBar = this.healthBarBackground.querySelector('.current-health');
        this.titleElm = this.statsWindow.querySelector(`label`);
        this.imageContainer = document.querySelector(`.${entity}-self`);
        this.entityImage = this.imageContainer.querySelector('img');
    }

    setTitle(titleValue = 'Lvl.?? - Unknown') {
        this.titleElm.innerText = titleValue;
    }

    setHpBar(value, max) {
        let percentageHealth = value/max;
        if (percentageHealth < 0) {
            percentageHealth = 0;
        }
        this.currentHealthBar.style.transform = `scale(${percentageHealth}, 1)`;
    }

    setImageSrc(url) {
        this.entityImage.src = url;
    }

    async attackAnimation(duration = 1000) {
        this.entityImage.classList.add('tween');
        await Time.sleep(duration);
        this.entityImage.classList.remove('tween');
    }

    async dodgeAnimation(duration = 1000) {
        this.entityImage.classList.add('dodge');
        await Time.sleep(duration)
        this.entityImage.classList.remove('dodge');
    }
}

export default EntityDisplayBattle;
