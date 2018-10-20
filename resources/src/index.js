// import _ from 'lodash';
// import MediaQuery from 'react-responsive';
import React from 'react';
import ReactDOM from 'react-dom';
import AliceCarousel from 'react-alice-carousel';
import 'react-alice-carousel/lib/alice-carousel.css';
import CandidateCard from './candidate-card';

class Carousel extends React.Component {
    constructor(props){
        super(props);
        this.createChildren = this.createChildren.bind(this);
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

    render() {
        let responsive = {
            0: { items: 1 },
            600: { items: 2 },
            1024: { items: 4 },
        }
        return (
            <AliceCarousel mouseDragEnabled responsive={responsive}>
                {this.createChildren()}
            </AliceCarousel>
        )
    }
}



ReactDOM.render(
    <Carousel/>,
    document.getElementById("root1")
);