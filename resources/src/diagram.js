import {Doughnut, Bar} from 'react-chartjs-2';
import React from 'react';

class ChartDiagram extends React.Component {

    render() {
        let colors = [
            "#ff6385",
            "#36a2eb",
            "#ffce56"
        ]

        let data = {
            labels: this.props.candidateNames,
            datasets: [{
                label: "Votes",
                data: this.props.votesPerCandidate,
                backgroundColor: colors
            }]
        }

        if(this.props.diagram === "doughnut") {
            return (
                <div>
                    <div className="h4">{this.props.post}</div>
                    <Doughnut data={data}/>
                </div>
            );
        } else {
            return (
                <div>
                    <div className="h4">{this.props.post}</div>
                    <Bar data={data}/>
                </div>
            );
        }

        
    }
}

export default ChartDiagram;