
import Monster from "./Monster";
import Player from "./Player";
import Time from "../Time";
import CombatNotification from "./CombatNotification";
import CombatMenu from "./CombatMenu";

class Battle {

    delayBetweenTurns = 1500;
    combatNotification;

    constructor(battleData) {
        this.monster = new Monster(battleData.monster, this);
        this.player = new Player(battleData.player, this);
        this.combatNotification = new CombatNotification();
        this.combatMenu = new CombatMenu(this, this.player);

        this.startBattle();
    }

    startBattle() {
        this.combatMenu.show();
    }

    async battleCallback(playerCombatAction) {
        let combatActions = [playerCombatAction, this.monster.getCombatAction()];
        // combatActions.forEach(async combatAction => await combatAction.handle());

        for (const combatAction of combatActions) {
            await combatAction.handle(this.notify);
            await Time.sleep(this.delayBetweenTurns);
        }

        if (!this.player.isAlive()) {
            return this.handleBattleLost();
        }

        if (!this.monster.isAlive()) {
            return this.handleBattleWon();

        }

        this.combatMenu.show();
        // console.table([this.player.stats, this.monster.stats]);
        // console.table(combatActions);
    }

    notify = async (message) => {
        this.combatNotification.show(message);
    }

    handleBattleWon() {
        //TODO: implement function
        //display death animation?
        // display victory screen? let server know!
    }

    handleBattleLost() {
        //TODO: implement function
        // ??? gameover? delete battle and respawn somewhere?
        // some starting area? closest safe area within 1000 blocks? if there are none die permanently?
        // death animation
    }

    escape() {
        //TODO: implement function, maybe? can i handle this with skills or so?
    }

    static noBattle() {
        this.clearBattleScreen();
        this.putTextInMiddleOfBattleScreen('You are not in a battle');
    }

    static clearBattleScreen() {
        let battleContainer = document.querySelector('.battle-container');
        Array.from(battleContainer.children).forEach(child => battleContainer.removeChild(child));
    }

    static putTextInMiddleOfBattleScreen(text) {
        let battleContainer = document.querySelector('.battle-container');
        let shooText = document.createTextNode('You are not in a battle. Shoo...');
        battleContainer.appendChild(shooText);
    }
}

export default Battle;
