// import _ from 'lodash';
// import MediaQuery from 'react-responsive';
import React from 'react';
import ReactDOM from 'react-dom';
import AliceCarousel from 'react-alice-carousel';
import 'react-alice-carousel/lib/alice-carousel.css';
import CandidateCard from './candidate-card';

class CandidatesCarousel extends React.Component {
    constructor(props){
        super(props);
        this.createChildren = this.createChildren.bind(this);

        this.state = {
            chosen: ""
        }

        this.renderCandidateCards = this.renderCandidateCards.bind(this);
        this.handleVote = this.handleVote.bind(this);
    }

    createChildren(){
        let children = [];
        for(let i = 0; i <= 10; i++) {
            children.push(
                <CandidateCard/>
            )
        }
        return children;
    }

    handleVote(candidateChosen){
        let post = this.props.post;
        let vote = {
            post: post, 
            candidateId: candidateChosen
        };
        this.props.onVote(vote);
    }

    renderCandidateCards() {
        let candidateCards = [];
        for(let candidate of this.props.items){
            candidateCards.push(
                <CandidateCard
                    thumbnail={candidate["thumbnailFileName"]}
                    candidateName={candidate["candidate_name"]}
                    shortManifesto={candidate["short_manifesto"]}
                    id={candidate["id"]}
                    onVote={this.handleVote}
                />
            );
        }
        console.log("The CandidateCards: ", candidateCards);
        return candidateCards;
    }

    render() {
        let positionLabelStyling = {
            fontSize: "20px",
            fontWeight: "600"
        }
        let responsive = {
            0: { items: 1 },
            600: { items: 2 },
            1024: {items: 3},
            1240: { items: 4 }
        }

        return (
            <div className="bg-light rounded my-2">
                <a className="ml-3 text-dark" style={positionLabelStyling}>{this.props.post}</a>
                <div className="mt-2">
                    <AliceCarousel mouseDragEnabled responsive={responsive} items={this.renderCandidateCards()}>
                        {/* {this.createChildren()} */}
                    </AliceCarousel>
                </div>
            </div>
        )
    }
}

export default CandidatesCarousel;