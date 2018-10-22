import posed from 'react-pose';
import React from 'react';

const PosedImageOverlay = posed.div({
    reveal: {opacity: 1},
    conceal: {opacity: 0}
});

class CandidateCard extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            mouseOver: false
        };

        this.onMouseEnterEv = this.onMouseEnterEv.bind(this);
        this.onMouseLeaveEv = this.onMouseLeaveEv.bind(this);
        this.handleVote = this.handleVote.bind(this);
    }

    onMouseEnterEv() {
        this.setState({mouseOver: true});
        console.log("Mouse entered");
    }

    onMouseLeaveEv() {
        this.setState({mouseOver: false});
        console.log("Mouse left");
    }

    handleVote() {
        let candidateChosen = this.props.id;
        this.props.onVote(candidateChosen)
    }

    render() {
        console.log("IsChosen", this.props.isChosen);
        return (
            <div className="card mx-3" style={{width: "16rem", height: "22rem"}}>
                <div className={!this.props.isChosen ? "d-none" : ""}>Chosen</div>
                <img style={{filter: this.state.mouseOver ? "brightness(70%)" : ""}} className="card-img-top" src={"/software-engineering/stratizenvote/resources/content/candidateImages/" + this.props.thumbnail}/>
                <PosedImageOverlay onMouseEnter={this.onMouseEnterEv} onMouseLeave={this.onMouseLeaveEv} pose={this.state.mouseOver ? "reveal" : "conceal"}>
                    <div className="card-img-overlay text-light">
                        <h1 className="h4 card-title">{this.props.candidateName}</h1>
                        <div className="card-text">{this.props.shortManifesto}</div>
                    </div>
                </PosedImageOverlay>
                <div className="card-img-overlay d-flex justify-content-center">
                    <i className={!this.props.isChosen ? "far fa-check-circle fa-7x d-none" : "far fa-check-circle fa-7x"}></i>
                </div>
                <div className="card-body">
                    <div className="d-flex justify-content-between">
                        <div className="card-title mx-2">
                            <h1 className="h5">{this.props.candidateName}</h1>
                        </div>
                        <button className="btn text-light" onClick={this.handleVote} style={{backgroundColor: "#e2472f", zIndex: "200"}}>Vote</button>
                    </div>
                </div>
            </div>
        );
    }
}

export default CandidateCard;