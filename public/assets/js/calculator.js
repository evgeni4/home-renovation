const squareInput = document.getElementById('square-input');
const squareRange = document.getElementById('range-input');

const doorInput = document.getElementById('door-input');
const doorRange = document.getElementById('range-door');

const windowInput = document.getElementById('windows-input');
const windowsRange = document.getElementById('range-windows');
//const ceilings = document.getElementById('ceilings-input');


const totalElement = document.getElementById('total-input')
const squareRangeElement = document.querySelector('input[name="square"]');
const doorElement = document.querySelector('input[name="door"]');
const windowsElement = document.querySelector('input[name="windows"]');
const ceilingsElement = document.getElementById('ceilings-input')
const tileElement = document.getElementById('tile-input')
const typeDoorElement = document.getElementById('type-door')

squareRangeElement.addEventListener('input', calculate)
doorElement.addEventListener('input', calculate)
windowsElement.addEventListener('input', calculate)
ceilingsElement.addEventListener('change', calculate)
tileElement.addEventListener('change', calculate)
typeDoorElement.addEventListener('change', calculate)
const basePrice = 500;
calculate()

function calculate() {
    squareInput.innerText = squareRange.value;
    doorInput.innerText = doorRange.value;
    windowInput.innerText = windowsRange.value;


    const formatCost = new Intl.NumberFormat('ru')
    const square = parseInt(squareRange.value);
    const ceiling = parseFloat(ceilingsElement.value);
    const tile = parseFloat(tileElement.value);
    const typeDoor = parseFloat(typeDoorElement.value);

    const door = parseInt(doorRange.value);
    const windows = parseInt(windowsRange.value);
    let totalCost;

    totalCost = (windows * 1500) + (door * 2000) + (basePrice * square * ceiling * tile * typeDoor);


    totalElement.innerText = formatCost.format(totalCost);
}

const totalFenceElement = document.getElementById('totalFence');

const lengthInput = document.getElementById('length-total');
const lengthRange = document.getElementById('length-input');
const lengthRangeElement = document.querySelector('input[name="length"]');
const heightInput = document.getElementById('height-total');
const heightRange = document.getElementById('height-input');
const heightRangeElement = document.querySelector('input[name="height"]');

const fenceStyleElement = document.getElementById('fenceStyle');
const gateTypeElement = document.getElementById('gateType');

lengthRangeElement.addEventListener('input', lengthFence)
heightRangeElement.addEventListener('input', lengthFence)
fenceStyleElement.addEventListener('change', lengthFence)
gateTypeElement.addEventListener('change', lengthFence)
const basePriceFence = 500;
lengthFence()

function lengthFence() {
    lengthInput.innerText = lengthRange.value

    heightInput.innerText = heightRange.value

    const formatFence = new Intl.NumberFormat('ru')
    let totalFenceCost;
    const length = parseInt(lengthRange.value);
    const height = parseInt(heightRange.value);
    const style = parseFloat(fenceStyleElement.value)
    const gateType = parseFloat(gateTypeElement.value)

    totalFenceCost = (basePriceFence * length * height) * style * gateType;
    totalFenceElement.innerText = formatFence.format(totalFenceCost);
}

const asphaltTotalPrice = document.getElementById('asphalt-total-price')

const asphaltWidthInputElement = document.getElementById('asphalt-width-input')
const asphaltTotalElement = document.getElementById('asphalt-total-width')
asphaltWidthInputElement.addEventListener('input', asphaltCalculate)

const asphaltLengthInputElement = document.getElementById('asphalt-length-input')
const asphaltTotalLengthElement = document.getElementById('asphalt-total-length')
asphaltLengthInputElement.addEventListener('input', asphaltCalculate)

const asphaltCheckboxElement = document.getElementById('asphalt-checkbox')
asphaltCheckboxElement.addEventListener('input', asphaltCalculate)

const asphaltBasePrice = 500
asphaltCalculate();

function asphaltCalculate() {
    asphaltTotalElement.innerText = asphaltWidthInputElement.value;
    asphaltTotalLengthElement.innerText = asphaltLengthInputElement.value

    const formatAsphalt = new Intl.NumberFormat('ru')

    let asphaltTotalCost;
    const asphaltWidth = parseInt(asphaltWidthInputElement.value)
    const asphaltLength = parseInt(asphaltLengthInputElement.value)
    const asphaltCheckbox = asphaltCheckboxElement.checked ? parseFloat(asphaltCheckboxElement.value) : 1;
    console.log(asphaltCheckbox)
    asphaltTotalCost = (asphaltBasePrice * (asphaltWidth * asphaltLength) * asphaltCheckbox)
    asphaltTotalPrice.innerText = formatAsphalt.format(asphaltTotalCost)
}



