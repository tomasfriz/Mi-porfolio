import './App.css'
import Card from './components/Card';
import ShowHide from './components/ShowHide';
import vehicles from "./data/vehicles";

function App() {
  const vehicleList = vehicles.map((v) => {
    return <Card title = {v.name} description = {v.description} />
  })

  return (
    <div className='App'>
      <h1>Galeria de Autos</h1>
      <div className='container'>
        {vehicleList}
      </div>
      <ShowHide />
    </div>
  )
}

export default App;