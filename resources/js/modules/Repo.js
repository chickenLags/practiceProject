import Item from "./Item";


class Repo {


    static getMagic() {

    }

    static getMagicForPlayer(id) {
        return [
            {name: 'water', level: 1, waterAttribute: 2, fireAttribute: -2, earthAttribute: 0, airAttribute: 1, multipler: 1.2},
            {name: 'fire',  level: 1, waterAttribute: -2, fireAttribute: 2, earthAttribute: 0, airAttribute: 3, multipler: 1.2},
            {name: 'fira',  level: 1, waterAttribute: -10, fireAttribute: 10, earthAttribute: 0, airAttribute: 3, multipler: 2},
            {name: 'quake', level: 1, waterAttribute: 1, fireAttribute: 0, earthAttribute: 3, airAttribute: 1, multipler: 1.2},
        ];
    }

    static getInventoryForPlayer(id) {
        return [
            {name: 'potion', quantity: 2},
            {name: 'phoenix down', quantity: 1},
            {name: 'ether', quantity: 77},
        ];
    }

    static getSkillsForPlayer(id) {
        return [];
        return [
            {name: steal},
            {name: run},
        ]
    }
}


export default Repo;
