import ReactDOM from 'react-dom';
import React from 'react';
import CandidatesCarousel from './candidate-list';

class BallotPage extends React.Component {
    constructor(props){
        super(props);

        this.state = {
            candidates: {},
            isLoaded: false,

            ballot: new Map()
        }

        this.handleVote = this.handleVote.bind(this);
        this.renderCandidateCarousel = this.renderCandidateCarousel.bind(this);
        this.handleCastBallot = this.handleCastBallot.bind(this);
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

    handleVote(vote) {
        let ballot = this.state.ballot;
        ballot.set(vote["post"], vote["candidateId"])
        this.setState({ballot: ballot});
        console.log(this.state.ballot);
    }

    handleCastBallot() {
        let url = "http://localhost/software-engineering/stratizenvote/index.html/ballotrest_controler/castballot";
        postFetch(url, this.state.ballot)
            .then(response => response.json())
            .then(result => {
                console.log(result);
            });
    }

    renderCandidateCarousel() {
        let candidatesCarousels = [];
        if(this.state.candidates) {
            let candidates = this.state.candidates;
            for (let p in candidates) {
                if(candidates.hasOwnProperty(p)){
                    candidatesCarousels.push(
                        <CandidatesCarousel
                            post={p}
                            items={candidates[p]}
                            onVote={this.handleVote}
                            chosen={this.state.ballot.get(p)}
                        />
                    );
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
                    <button onClick={this.handleCastBallot} className="btn cast-ballot text-light">Cast Ballot</button>
                </div>
            )
        }
        // return <div>Hello World II</div>
    }
}

function postFetch(url, data){
    return fetch(url, {
        method: "POST",
        body: JSON.stringify(data)
    });
}

ReactDOM.render(
    <BallotPage/>,
    document.getElementById("root1")
);