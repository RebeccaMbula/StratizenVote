import ReactDOM from 'react-dom';
import React from 'react';
import CandidatesCarousel from './candidate-list';

class BallotPage extends React.Component {
    constructor(props){
        super(props);

        this.state = {
            candidates: {},
            isLoaded: false,

            ballot: {}
        }

        this.handleCastBallot = this.handleCastBallot.bind(this);
        this.renderCandidateCarousel = this.renderCandidateCarousel.bind(this);
    }

    componentDidMount() {
        fetch("http://localhost/software-engineering/stratizenvote/index.php/candidatesrest_controller/candidatesbypost")
            .then(res => res.json())
            .then(
                result => {
                    this.setState({candidates: result, isLoaded: true});
                },
                error => {
                    this.setState({isLoaded: true, error});
                }
            );
    }

    handleCastBallot(ballot) {
        this.setState({ballot: ballot});
    }

    renderCandidateCarousel() {
        let candidatesCarousels = [];
        if(this.state.candidates) {
            let candidates = this.state.candidates;
            for (let p in candidates) {
                if(candidates.hasOwnProperty(p)){
                    candidatesCarousels.push(<CandidatesCarousel post={p} items={candidates[p]} onVote/>);
                    // for(let c of candidates[p]) {
                    //     console.log(c);
                    // }
                }
            }
        } else 
            console.log("No candidates");
        return candidatesCarousels;
    }

    render(){
        
        const {isLoaded, error, candidates, positions} = this.state;
        if(error) {
            return <div>Error: {error.message}</div>
        } else if (!isLoaded) {
            return <div>Loading...</div>
        } else {
            return (
                <div>
                    {this.renderCandidateCarousel()}
                    <button className="btn">Cast Ballot</button>
                </div>
            )
        }
        // return <div>Hello World II</div>
    }
}



ReactDOM.render(
    <BallotPage/>,
    document.getElementById("root1")
);