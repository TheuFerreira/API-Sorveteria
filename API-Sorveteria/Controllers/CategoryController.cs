using API_Sorveteria.Interfaces;
using API_Sorveteria.Models;
using API_Sorveteria.Repositories;
using Microsoft.AspNetCore.Mvc;

namespace API_Sorveteria.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class CategoryController
    {
        private readonly ICategoryRepository _categoryRepository;

        public CategoryController()
        {
            _categoryRepository = new CategoryRepository();
        }

        [HttpGet]
        public JsonResult GetTypes()
        {
            IList<Category> categories = _categoryRepository.GetAll();
            JsonResult json = new(categories);
            return json;
        }
    }
}
