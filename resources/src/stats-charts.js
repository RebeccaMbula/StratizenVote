import React from 'react';
import ReactDOM from 'react-dom';
import ChartDiagrams from './diagram';

class Stats extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            candidates: {}, 
            diagram: "doughnut"
        }

        this.renderChartDiagrams = this.renderChartDiagrams.bind(this);
        this.handleDoughnutClick = this.handleDoughnutClick.bind(this);
        this.handleBarClick = this.handleBarClick.bind(this);
    }

    handleDoughnutClick(e) {
        e.preventDefault();
        
        if(this.state.diagram !== "doughnut")
            this.setState({diagram: "doughnut"});
    }

    handleBarClick(e) {
        e.preventDefault();
        
        if(this.state.diagram !== "bar")
            this.setState({diagram: "bar"});
    }

    componentDidMount() {
        fetch("http://localhost/software-engineering/stratizenvote/index.php/candidatesrest_controller/candidatesbypost")
            .then(res => res.json())
            .then(
                result => {
                    this.setState({candidates: result, isLoaded: true});
                    console.log("The result", result);
                },
                error => {
                    this.setState({isLoaded: true, error});
                }
            );
    }

    renderChartDiagrams() {
        let chartDiagrams = [];
        if(this.state.candidates) {
            let candidates = this.state.candidates;
            for(let post in candidates) {
                if(candidates.hasOwnProperty(post)){
                    let candidateNames = [];
                    let votesPerCandidate = [];
                    for(let candidate of candidates[post]) {
                        candidateNames.push(candidate["candidate_name"]);
                        votesPerCandidate.push(candidate["votes"]);
                    }
                    console.log(post, candidateNames);
                    console.log(candidateNames, votesPerCandidate);
                    chartDiagrams.push(
                        <ChartDiagrams
                            diagram={this.state.diagram}
                            post={post}
                            candidateNames={candidateNames}
                            votesPerCandidate={votesPerCandidate}
                        />
                    );
                }
            }
        }
        return chartDiagrams;
    }

    render() {
        const {isLoaded, error} = this.state;
        if(error) {
            return <div>Error: {error.message}</div>
        } else if (!isLoaded) {
            return <div>Loading...</div>
        } else {
            return (
                <div className="container">
                    <div className="dropdown">
                            <button className="btn primary-button dropdown-toggle text-light" type="button" id="chartTypes" data-toggle="dropdown">
                                Choose Chart
                            </button>
                            <div className="dropdownMenu">
                                <a className="dropdown-item" href="#" onClick={this.handleDoughnutClick}>Doughnut</a>
                                <a className="dropdown-item" href="#" onClick={this.handleBarClick}>Bar</a>
                            </div>
                    </div>
                    <div>
                        {this.renderChartDiagrams()}
                    </div>
                </div>
            );
        }
    }

}

ReactDOM.render(
    <Stats/>,
    document.getElementById("root")
);