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
    }

    onMouseEnterEv() {
        this.setState({mouseOver: true});
        console.log("Mouse entered");
    }

    onMouseLeaveEv() {
        this.setState({mouseOver: false});
        console.log("Mouse left");
    }

    render() {
        return (
            <div className="card mx-3" style={{width: "16rem"}}>
                <img style={{filter: this.state.mouseOver ? "brightness(70%)" : ""}} className="card-img-top" src={"/software-engineering/stratizenvote/resources/content/candidateImages/" + this.props.thumbnail}/>
                <PosedImageOverlay onMouseEnter={this.onMouseEnterEv} onMouseLeave={this.onMouseLeaveEv} pose={this.state.mouseOver ? "reveal" : "conceal"}>
                    <div className="card-img-overlay text-light">
                        <h1 className="h4 card-title">{this.props.candidateName}</h1>
                        <div className="card-text">{this.props.shortManifesto}</div>
                    </div>
                </PosedImageOverlay>
                <div className="card-body">
                    <div className="d-flex justify-content-between">
                        <div className="card-title mx-2">
                            <h1 className="h5">{this.props.candidateName}</h1>
                        </div>
                        <button className="btn text-light" style={{backgroundColor: "#e2472f", zIndex: "200"}}>Vote</button>
                    </div>
                </div>
            </div>
        );
    }
}

export default CandidateCard;