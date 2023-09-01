function generateGraveInputs() {
    const sectionNumberInput = document.getElementById("sectionNumber");
    const gravePerSecContainer = document.getElementById("gravePerSecContainer");
  
    // Clear any previously generated inputs
    gravePerSecContainer.innerHTML = "";
  
    // Get the number of sections entered by the user
    const numSections = parseInt(sectionNumberInput.value);
  
    // Generate input fields based on the user's input
    for (let i = 0; i < numSections; i++) {
      const inputDiv = document.createElement("div");
      inputDiv.className = "mb-3";
      inputDiv.innerHTML = `
        <label for="GravesInSection${i + 1}" class="form-label">Graves in Section ${i + 1}</label>
        <input type="number" class="form-control" id="GravesInSection${i + 1}" />
      `;
      gravePerSecContainer.appendChild(inputDiv);
    }
  }
  