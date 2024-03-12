import React, { useState } from 'react'
import "./ShowHide.css"

function ShowHide() {
    const [show, setShow] = useState(false);

    const handleClick = (event) => {
        setShow(!show);
    }

    return (
        <div className='button'>
            <button onClick={handleClick}>{show ? "Hide " : "Show "} Text</button>
            {show && <h2>HIDE ME!</h2>}
        </div>
    )
}

export default ShowHide