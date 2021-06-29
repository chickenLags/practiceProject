
class Skill {
    name;
    origin;
    target;

}

class Steal extends Skill {
    constructor(origin, target) {
        super();
        this.name = 'steal';
        this.origin = origin;
        this.target = target;
    }
}

class Run extends Skill {
    constructor(origin, target) {
        super();
        this.name = 'run';
        this.origin = origin;
        this.target = target;
    }
}

export {Skill, Steal, Run};
